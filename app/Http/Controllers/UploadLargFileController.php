<?php

namespace App\Http\Controllers;

use App\Jobs\CsvProcess;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class UploadLargFileController extends Controller
{
    // public function store(Request $request)
    // {
    //     if ($request->hasFile('csvFile')) {
    //         $data = file($request->csvFile);

    //         //chunking file

    //         $chunks = array_chunk($data, 1000);
    //         $path = resource_path('temp');

    //         foreach ($chunks as $key => $chunk) {
    //             $name = "/tmp{$key}.csv";
    //             file_put_contents($path . $name, $chunk);
    //         }

    //         //get all csv file i made

    //         $files = glob($path . '/*.csv');

    //         $header = [];
    //         foreach ($files as $key => $file) {
    //             $data = array_map('str_getcsv', file($file));
    //             if ($key === 0) {
    //                 $header = $data[0];
    //                 unset($data[0]);
    //             }
    //             dispatch(new CsvProcess($header,$data));

    //             unlink($file);
    //         }
    //     }
    //     return 'Done';
    // }

    public function store(Request $request)
    {
        if ($request->hasFile('csvFile')) {
            $data = file($request->csvFile);

            //chunking file

            $chunks = array_chunk($data, 1000);

            $header = [];
            $batch = Bus::batch([])->dispatch();
            foreach ($chunks as $key => $chunk) {
                $data = array_map('str_getcsv', $chunk);
                if ($key === 0) {
                    $header = $data[0];
                    unset($data[0]);
                }
                $batch->add(new CsvProcess($header, $data));
                // dispatch(new CsvProcess($header, $data));
            }
            return $batch;
        }
        return 'Done';
    }

    public function batch()
    {
        $batchId = request('id');
        return Bus::findBatch($batchId);

    }
}
