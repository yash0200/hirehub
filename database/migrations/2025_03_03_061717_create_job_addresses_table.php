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
        Schema::create('job_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id'); // Foreign key reference to jobs table
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('postcode');
            $table->text('complete_address'); // Full address
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_addresses');
    }
};
