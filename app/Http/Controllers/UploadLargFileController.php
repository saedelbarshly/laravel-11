<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class UploadLargFileController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('csvFile')) {
            $data = file($request->csvFile);

            //chunking file
            $chunks = array_chunk($data, 1000);
            foreach ($chunks as $key => $chunk) {
                $name = "/tmp{$key}.csv";
                $path = resource_path('temp');
                file_put_contents($path . $name, $chunk);
            }

            //get all csv file i made

            $path = resource_path('temp');
            $files = glob($path . '/*.csv');

            $header = [];
            foreach ($files as $key => $file) {
                $data = array_map('str_getcsv', file($file));
                if ($key === 0) {
                    $header = $data[0];
                    unset($data[0]);
                }

                foreach ($data as $item) {
                    $org = array_combine($header, $item);
                    Organization::create($org);
                }

                unlink($file);
            }

            return 'Done';
        }
        dd('gggg');
    }
}
