<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where(['email' => 'johndoe@gmail.com'])->first();

        $data_arr = [
            [
                'id' => 1,
                'order_id' => 1,
                'product_id' => 1,
                'variation_id' => 1,
                'name' => "Under Armour Shirt",
                'quantity' => 2,
                'tax_class' => "",
                'subtotal' => 60.00,
                'subtotal_tax' => 4.50,
                'total' => 60.00,
                'total_tax' => 4.50,
                'sku' => 'SKU0001',
                'price' => 3,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id' => 2,
                'order_id' => 2,
                'product_id' => 1,
                'variation_id' => 2,
                'name' => "Under Armour Shirt",
                'quantity' => 2,
                'tax_class' => "",
                'subtotal' => 60.00,
                'subtotal_tax' => 4.50,
                'total' => 60.00,
                'total_tax' => 4.50,
                'sku' => 'SKU0001',
                'price' => 3,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id' => 3,
                'order_id' => 2,
                'product_id' => 2,
                'variation_id' => 3,
                'name' => 'Under Armour pants',
                'quantity' => 2,
                'tax_class' => "",
                'subtotal' => 60.00,
                'subtotal_tax' => 4.50,
                'total' => 60.00,
                'total_tax' => 4.50,
                'sku' => 'SKU0001',
                'price' => 3,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],

        ];

        DB::table('order_items')->insert($data_arr);
    }
}
