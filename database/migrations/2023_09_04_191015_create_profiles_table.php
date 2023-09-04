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
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->unique();
            $table->string('phone_number');
            $table->string('occupation');
            $table->dateTime('birthday');
            $table->string('marital_status');
            $table->dateTime('marriage_anniversary')->nullable();
            $table->boolean('is_church_member')->default(true);
            $table->dateTime('church_join_date')->nullable();
            $table->unsignedInteger('church_centre_id')->nullable();
            $table->boolean('growth_track_completed');
            $table->unsignedInteger('home_cell_id')->nullable();
            $table->unsignedInteger('colony_id')->nullable();
            $table->json('roles_and_responsibilities')->nullable();
            $table->boolean('is_tither');
            $table->boolean('is_partner');
            $table->string('payment_interval')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
