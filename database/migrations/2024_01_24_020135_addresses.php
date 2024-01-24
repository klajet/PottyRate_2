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

            $table->char('country', '100')->nullable(true);
            $table->char('voivodeship', '100')->nullable(true);
            $table->char('city', '100')->nullable(true);
            $table->char('street', '100')->nullable(true);
            $table->char('number', '10')->nullable(true);
            $table->decimal('latitude');
            $table->decimal('longtitude');

            $table->timestamps();
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
