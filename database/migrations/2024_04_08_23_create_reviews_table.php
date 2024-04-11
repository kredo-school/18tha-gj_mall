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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title' , 50);
            $table->text('content');
            $table->tinyInteger('rating')->nullable()->comment('min:0, max:5');
            $table->unsignedBigInteger('order_line_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();

            $table->foreign('product_id')->on('products')->references('id');
            $table->foreign('customer_id')->on('customers')->references('id');
            $table->foreign('order_line_id')->references('id')->on('shop_orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
