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
        Schema::create('meta_data', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('meta_data_type_id');
            $table->foreign('meta_data_type_id')->references('id')->on('meta_data_types');

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');

            $table->unsignedBigInteger('order_item_id')->nullable();
            $table->foreign('order_item_id')->references('id')->on('order_items');

            $table->unsignedBigInteger('tax_line_id')->nullable();
            $table->foreign('tax_line_id')->references('id')->on('tax_lines');

            $table->unsignedBigInteger('shipping_line_id')->nullable();
            $table->foreign('shipping_line_id')->references('id')->on('shipping_lines');

            $table->string('key');
            $table->string('value');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_data');
    }
};
