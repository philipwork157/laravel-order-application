<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('transaction_type_id');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types');

            $table->unsignedBigInteger('transaction_status_id');
            $table->foreign('transaction_status_id')->references('id')->on('transaction_status');

            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currency');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->float('amount', 10, 2);
            $table->string('payment_method');
            $table->string('payment_gateway');
            $table->string('refund_id')->nullable();
            $table->string('additional_info')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
