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
            $table->foreign('shipping_method_id')->on('shipping_method')->references('id');
            $table->foreign('status_id')->on('order_status')->references('id');
            $table->foreign('address_id')->on('addresses')->references('id');
            $table->foreign('customer_id')->on('customers')->references('id');
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
