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
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('shipping_method_id');
            $table->unsignedBigInteger('status_id');
            $table->double('order_total');
            $table->timestamps();

            // Foreign Keys
            // $table->foreign('shipping_method_id')->references('shipping_method')->on('id');
            // $table->foreign('id')->references('order_line')->on('order_id');
            // $table->foreign('customer_id')->references('customers')->on('id');
            // $table->foreign('address_id')->references('address')->on('id');
            // $table->foreign('status_id')->references('order_status')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_orders');
    }
};
