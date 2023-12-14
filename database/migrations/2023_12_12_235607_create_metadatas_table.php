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
        Schema::create('metadatas', function (Blueprint $table) {
            $table->id();
            $table->date('issuance_date')->nullable();
            $table->integer('business_status_code')->nullable();
            $table->string('business_status_name')->nullable();
            $table->integer('detail_business_status_code')->nullable();
            $table->string('detail_business_status_name')->nullable();
            $table->string('tel_number')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('lot_based_address')->nullable();
            $table->string('road_name_address')->nullable();
            $table->integer('street_postal_code')->nullable();
            $table->string('business_name')->nullable();
            $table->string('x_coordinate')->nullable();
            $table->string('y_coordinate')->nullable();
            $table->integer('room_count')->nullable();
            $table->integer('adolescent_room_count')->nullable();
            $table->string('adolescent_room_status')->nullable()->default('N');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metadatas');
    }
};
