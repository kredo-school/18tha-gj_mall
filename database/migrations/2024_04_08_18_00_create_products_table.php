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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price', 8, 2);
            $table->integer('qty_in_stock');
            $table->text('description');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_detail_id');
            $table->timestamps();

            // $table->foreign('id')->on('order_lines')->references('product_id');
            $table->foreign('status_id')->on('product_status')->references('id');
            $table->foreign('category_id')->on('categories')->references('id');
            $table->foreign('product_detail_id')->on('product_details')->references('id');
            $table->foreign('seller_id')->on('sellers')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
