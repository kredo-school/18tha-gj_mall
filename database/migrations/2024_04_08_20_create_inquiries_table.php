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
            $table->string('title', 50);
            $table->text('content');
            $table->text('answer')->nullable();
            $table->text('translated_answer')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('inquiry_status_id')->default(1);
            $table->timestamps();

            // Foreign Keys
            $table->foreign('genre_id')->on('inquiry_genres')->references('id');
            $table->foreign('inquiry_status_id')->on('inquiry_status')->references('id');
            // $table->foreign('product_id')->on('products')->references('id');
            $table->foreign('customer_id')->on('customers')->references('id');
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
