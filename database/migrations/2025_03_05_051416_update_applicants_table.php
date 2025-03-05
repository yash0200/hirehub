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
        Schema::table('applicants', function (Blueprint $table) {
            $table->unsignedBigInteger('candidate_id')->after('id');
            $table->unsignedBigInteger('job_id')->after('candidate_id');
            $table->dropColumn(['name', 'job_title','date_applied']);

            // Foreign Keys
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('job_title')->after('name');
            $table->date('date_applied')->after('job_title');

            $table->dropForeign(['candidate_id']);
            $table->dropForeign(['job_id']);
            $table->dropColumn(['candidate_id', 'job_id']);
        });
    }
};
