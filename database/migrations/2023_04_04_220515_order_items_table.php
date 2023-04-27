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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');

            $table->unsignedBigInteger('variation_id');
            $table->foreign('variation_id')->references('id')->on('variations');

            $table->string('name');
            $table->integer('quantity');
            $table->string('tax_class');
            $table->float('subtotal');
            $table->float('subtotal_tax');
            $table->float('total');
            $table->float('total_tax')->nullable();
            $table->float('price');
            $table->string('sku');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
