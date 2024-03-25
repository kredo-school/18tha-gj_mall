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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->text('answer')->nullable();
            $table->text('translated_answer')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('inquiry_status_id')->default(1);
            $table->timestamps();

            // Foreign Keys
            // $table->foreign('customer_id')->references('customers')->on('id');
            // $table->foreign('product_id')->references('products')->on('id');
            // $table->foreign('genre_id')->references('inquiry_genres')->on('id');
            // $table->foreign('inquiry_status_id')->references('inquiry_status')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
