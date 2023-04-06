<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsSeeder extends Seeder
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
                'user_id' => $user->id,
                'transaction_type_id' => 1,
                'transaction_status_id' => 1,
                'currency_id' => 1,
                'order_id' => 1,
                'amount' => 500.00,
                'payment_method' => 'PayPal',
                'payment_gateway' => 'PayPal',
                'refund_id' => '',
                'additional_info' => '',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]
        ];

        DB::table('transactions')->insert($data_arr);
    }
}
