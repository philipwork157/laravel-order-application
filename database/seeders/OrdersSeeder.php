<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
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
                'number' => fake()->randomNumber(),
                'processing_status_id' => 2,
                'currency_id' => 1,
                'shipping_total' => fake()->randomDigit(),
                'shipping_tax' => "0.00",
                'cart_tax' => "13.5",
                'total' => "20.00",
                'total_tax' => "13.5",
                'prices_include_tax' => false,
                'user_id' => $user->id,
                'user_note' => "",
                'payment_method' => "bacs",
                'payment_method_title' => "Direct Bank Transfer",
                'date_paid' => date('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id' => 2,
                'number' => fake()->randomNumber(),
                'processing_status_id' => 3,
                'currency_id' => 1,
                'shipping_total' => fake()->randomDigit(),
                'shipping_tax' => "0.00",
                'cart_tax' => "13.5",
                'total' => "120.00",
                'total_tax' => "13.5",
                'prices_include_tax' => false,
                'user_id' => $user->id,
                'user_note' => "",
                'payment_method' => "bacs",
                'payment_method_title' => "Direct Bank Transfer",
                'date_paid' => date('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
        ];

        DB::table('orders')->insert($data_arr);
    }
}
