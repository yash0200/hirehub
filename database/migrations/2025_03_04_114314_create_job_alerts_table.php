<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAlertsTable extends Migration
{
    public function up()
    {
        Schema::create('job_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained()->onDelete('cascade'); // Relates to the candidates table
            $table->json('criteria'); // This will store search criteria like category, location, etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_alerts');
    }
};

