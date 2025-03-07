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
            $table->unsignedBigInteger('category_id')->nullable()->after('criteria');
            $table->string('location')->nullable()->after('category_id');
            $table->string('salary_range')->nullable()->after('location');
            $table->enum('job_type', ['full-time', 'part-time', 'remote', 'internship'])->nullable()->after('salary_range');
            $table->foreign('category_id')->references('id')->on('job_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_alerts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn(['category_id', 'location', 'salary_range', 'job_type']);
        });
    }
};
