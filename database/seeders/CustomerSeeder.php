<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $batchSize = 10000; // Adjust the batch size as needed
        // $totalRecords = 1000000;
        // $iterations = $totalRecords / $batchSize;

        // for ($i = 0; $i < $iterations; $i++) {
        //     Customer::factory()->count($batchSize)->create();
        //     echo "Inserted batch " . ($i + 1) . "\n";
        // }

        // Customer::factory()->count(10000)->create();
    }
}
