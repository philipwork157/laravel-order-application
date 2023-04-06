<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_arr = [
            [
                'id' => 'flat_rate',
                'method_description' => "Flat Rate Shipping",
                'rate' => "150.00",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]
        ];

        DB::table('methods')->insert($data_arr);
    }
}
