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
            $table->enum('status', ['active', 'inactive', 'expired', 'deleted', 'closed'])->default('active')->change();
            $table->softDeletes(); // Adds deleted_at column for soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active')->change();
            $table->dropSoftDeletes();
        });
    }
};
