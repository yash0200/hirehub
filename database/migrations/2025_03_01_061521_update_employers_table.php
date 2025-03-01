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
            $table->string('phone')->nullable()->after('description');
            $table->string('company_size')->nullable()->after('description');
            $table->year('established_year')->nullable()->after('description');
            $table->string('facebook')->nullable()->after('description');
            $table->string('twitter')->nullable()->after('description');
            $table->string('linkedin')->nullable()->after('description');
            $table->string('country')->nullable()->after('description');
            $table->string('state')->nullable()->after('description');
            $table->string('city')->nullable()->after('description');
            $table->string('address')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn([
                'phone', 'company_size', 'established_year',
                'facebook', 'twitter', 'linkedin','country', 'state', 'city', 'address'
            ]);
        });
    }
};
