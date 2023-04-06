<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingLinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_arr = [
            [
                'id' => 1,
                'order_id' => 1,
                'method_id' => 'flat_rate',
                'total' => 100.00,
                'total_tax' => 0.00,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
        ];

        DB::table('shipping_lines')->insert($data_arr);
    }
}
