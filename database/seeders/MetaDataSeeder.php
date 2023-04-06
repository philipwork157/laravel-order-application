<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_arr = [
            ['id' => 1, 'meta_data_type_id' => 1, 'order_id' => 1, 'order_item_id' => null, 'tax_line_id' => null, 'shipping_line_id' => null, 'key' => '_download_permissions_granted', 'value' => 'yes', 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()],
            ['id' => 2, 'meta_data_type_id' => 3, 'order_id' => 1, 'order_item_id' => 1, 'tax_line_id' => null, 'shipping_line_id' => null, 'key' => 'color', 'value' => 'Red', 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()],
            ['id' => 3, 'meta_data_type_id' => 3, 'order_id' => 1, 'order_item_id' => 1, 'tax_line_id' => null, 'shipping_line_id' => null, 'key' => 'color', 'value' => 'Blue', 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()],
            ['id' => 4, 'meta_data_type_id' => 3, 'order_id' => 2, 'order_item_id' => 2, 'tax_line_id' => null, 'shipping_line_id' => null, 'key' => 'color', 'value' => 'Green', 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()],
            ['id' => 5, 'meta_data_type_id' => 3, 'order_id' => 2, 'order_item_id' => 2, 'tax_line_id' => null, 'shipping_line_id' => null, 'key' => 'size', 'value' => 'Medium', 'created_at' => Carbon::now()->toDateTimeString(), 'updated_at' => Carbon::now()->toDateTimeString()],
        ];

        DB::table('meta_data')->insert($data_arr);
    }
}
