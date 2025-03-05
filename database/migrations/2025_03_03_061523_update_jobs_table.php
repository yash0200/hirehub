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
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('job_post_time'); // Remove old field

            $table->date('deadline')->nullable()->after('location');
            $table->string('email')->after('deadline'); // Contact email
            $table->text('skills')->after('email'); // Required skills
            $table->string('experience')->after('skills'); // Experience required
            $table->string('industry')->after('experience'); // Industry category
            $table->string('gender')->nullable()->after('industry'); // Preferred gender
            $table->text('qualification')->after('gender'); // Education qualification
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->text('job_post_time'); // Restore the removed field
            $table->text('location'); 
            $table->dropColumn(['deadline', 'email', 'skills', 'experience', 'industry', 'gender', 'qualification']);
        });
    }
};
