<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Lookup tables
         */
        $this->call(AddressTypesSeeder::class);
        $this->call(MetaDataTypesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(TaxTypesSeeder::class);
        $this->call(VariationsSeeder::class);
        $this->call(MethodsSeeder::class);
        $this->call(RatesSeeder::class);
        $this->call(ProcessingStatusSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(TransactionTypesSeeder::class);
        $this->call(TransactionStatusSeeder::class);

        /**
         * Data tables
         */
        $this->call(UsersSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(OrderItemsSeeder::class);
        $this->call(ShippingLinesSeeder::class);
        $this->call(TaxLinesSeeder::class);
        $this->call(MetaDataSeeder::class);
        $this->call(TaxesSeeder::class);
        $this->call(TransactionsSeeder::class);

    }
}
