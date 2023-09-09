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
        Schema::create('devotional_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('devotional_id');
            $table->unsignedBigInteger('category_id');
            // $table->foreign('devotional_id')->references('id')->on('devotionals')->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devotional_category');
    }
};
