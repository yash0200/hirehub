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
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'password']);

            // Add 'user_id', 'contact', and 'photo'
            $table->unsignedBigInteger('user_id')->after('id')->unique();
            $table->string('contact')->after('user_id');
            $table->string('photo')->nullable()->after('contact');

            // Foreign key for 'user_id'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            
            // Drop newly added fields
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'contact', 'photo']);
        });
    }
};
