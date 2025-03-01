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
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn([
                'skills', 
                'resume', 
                'bio', 
                'experience', 
                'education', 
                'portfolio', 
                'job_title', 
                'work_experience'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->text('skills')->nullable();
            $table->string('resume')->nullable();
            $table->text('bio')->nullable();
            $table->text('experience')->nullable();
            $table->text('education')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('job_title')->nullable();
            $table->string('work_experience')->nullable();
        });
    }
};
