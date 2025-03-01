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
            $table->string('full_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->string('website')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widowed'])->nullable();
            $table->string('work_experience')->nullable();
            $table->string('age_range')->nullable();
            $table->string('education_levels')->nullable();
            $table->text('languages')->nullable();
            $table->text('description')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('nationality')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropColumn([
                'full_name', 'job_title', 'phone', 'dob', 'website', 'gender', 
                'marital_status', 'work_experience', 'age_range', 'education_levels', 
                'languages', 'description', 'facebook', 'twitter', 'linkedin', 
                'nationality', 'state', 'city', 'postal_code', 'address'
            ]);
        });
    }
};
