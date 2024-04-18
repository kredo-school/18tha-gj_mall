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
        Schema::create('product_status', function (Blueprint $table) {
            $table->id();
            $table->string('status',30)->unique()->comment('1:Exhibit request -> 2:Waiting for valuation -> 3:Evaluation -> (7:Suspended ->) 4:Waiting for display(Coming Soon) -> 5:Exhibited -> 6:Sold out');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_status');
    }
};
