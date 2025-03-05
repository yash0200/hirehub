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
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn(['country', 'state', 'city', 'address']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->string('country', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('street', 255)->nullable();
        });
    }
};
