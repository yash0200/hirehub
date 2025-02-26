<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id'); // Reference to Employer
            $table->string('image')->nullable(); // For storing the image path
            $table->string('title');
            $table->string('location');
            $table->text('job_post_time');
            $table->string('salary')->nullable();
            $table->string('job_type'); // Full-time, Part-time, etc.
            $table->string('category'); // Job category (e.g., IT, Marketing)
            $table->text('description');
            $table->timestamps();

            // Foreign key to employers table
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}


