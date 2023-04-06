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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');

            $table->unsignedBigInteger('processing_status_id');
            $table->foreign('processing_status_id')->references('id')->on('processing_status');

            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currency');

            $table->float('shipping_total', 10, 2);
            $table->float('shipping_tax', 10, 2);
            $table->float('cart_tax', 10, 2);
            $table->float('total', 10, 2);
            $table->float('total_tax', 10, 2);
            $table->boolean('prices_include_tax');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('user_note');
            $table->string('payment_method');
            $table->string('payment_method_title');
            $table->string('date_paid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
