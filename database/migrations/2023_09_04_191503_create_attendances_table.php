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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->uuid('user_id');
            $table->boolean('in_person')->default(false);
            $table->boolean('requires_feeding')->default(false);
            $table->boolean('requires_accommodation')->default(false);
            $table->boolean('requires_transport')->default(false);
            $table->json('services_required')->nullable();
            $table->json('children')->nullable();
            $table->json('dates_attending')->nullable();
            $table->boolean('checked_in')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
