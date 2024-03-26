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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name_on_card')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('payment_type_id');
            $table->string('provider')->unique();
            $table->integer('account_number');
            $table->date('expiry_date');
            $table->timestamps();

            // $table->foreign('customer_id')->references('id')->on('customers');
            // $table->foreign('payment_type_id')->references('id')->on('payment_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
