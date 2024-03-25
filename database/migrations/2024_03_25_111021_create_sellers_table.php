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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable()->unique();
            $table->string('password');
            $table->longText('avatar')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->timestamps();

            // Foreign Keys
            // $table->foreign('address_id')->references('address')->on('id');
            // $table->foreign('id')->references('products')->on('seller_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
