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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('unit_number')->nullable();
            $table->string('street_number')->nullable();
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('city');
            $table->string('region');
            $table->string('postal_code', 12);
            $table->string('country_code', 3);
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->on('customers')->references('id');
            $table->foreign('country_code')->on('countries')->references('alpha3');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
