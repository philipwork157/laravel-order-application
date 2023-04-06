<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxLinesSeeder extends Seeder
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
                'rate_id' => 1,
                'label' => 'State Tax',
                'compound' => false,
                'tax_total' => 13.50,
                'shipping_tax_total' => 0.00,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
        ];

        DB::table('tax_lines')->insert($data_arr);
    }
}
