<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_arr = [
            [
                'id' => 1,
                'address_type_id' => 1,
                'order_id' => 1,
                'first_name' => 'John',
                'last_name' => 'Mcafee',
                'company' => '',
                'address_1' => '15 Long Market Street',
                'address_2' => '',
                'city' => 'Cape Town',
                'state' => 'WC',
                'postcode' => '8000',
                'country' => 'ZA',
                'email' => 'john.doe@example.com',
                'phone' => '(555) 555-5555',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id' => 2,
                'address_type_id' => 2,
                'order_id' => 1,
                'first_name' => 'John',
                'last_name' => 'Roe',
                'company' => '',
                'address_1' => '15 Long Market Street',
                'address_2' => '',
                'city' => 'Cape Town',
                'state' => 'WC',
                'postcode' => '8000',
                'country' => 'ZA',
                'email' => 'john.doe@example.com',
                'phone' => '(555) 555-5555',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ],
        ];

        DB::table('address')->insert($data_arr);
    }
}
