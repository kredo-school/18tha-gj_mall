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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable()->unique();
            $table->string('password');
            $table->string('avatar', 15)->nullable();
            $table->timestamps();
        
            // Foreign Keys
            // $table->foreign('id')->references('shopping_cart_items')->on('customer_id');
            // $table->foreign('id')->references('favorites')->on('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
