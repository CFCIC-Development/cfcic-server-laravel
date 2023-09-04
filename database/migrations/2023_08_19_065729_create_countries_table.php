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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->default(' ');
            $table->string('region', 255)->nullable();
            $table->string('subregion', 255)->nullable();
            $table->string('currency', 255)->nullable();
            $table->string('ISO4217Code', 255)->nullable();
            $table->string('callingCode', 255)->nullable();
            $table->string('timezone', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
