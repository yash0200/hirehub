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
        Schema::table('job_alerts', function (Blueprint $table) {
            $table->text('criteria')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_alerts', function (Blueprint $table) {
            $table->json('criteria')->change(); // Rollback to JSON if needed
        });
    }
};
