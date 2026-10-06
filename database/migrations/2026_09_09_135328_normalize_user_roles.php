<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Convert existing role values to the standard values
        DB::table('users')
            ->where('role', 'Administrator / HR')
            ->update(['role' => 'admin']);

        DB::table('users')
            ->where('role', 'Applicant')
            ->update(['role' => 'applicant']);

        // Make applicant the default role for new users
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('applicant')->change();
        });
    }

    public function down(): void
    {
        DB::table('users')
            ->where('role', 'admin')
            ->update(['role' => 'Administrator / HR']);

        DB::table('users')
            ->where('role', 'applicant')
            ->update(['role' => 'Applicant']);

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('Applicant')->change();
        });
    }
};