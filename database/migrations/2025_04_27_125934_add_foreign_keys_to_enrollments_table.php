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
        Schema::table('enrollments', function (Blueprint $table) {
            $table->foreign(['client_id'], 'fk_enrollments_clients')->references(['id'])->on('clients')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['program_id'], 'fk_enrollments_programs')->references(['id'])->on('programs')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropForeign('fk_enrollments_clients');
            $table->dropForeign('fk_enrollments_programs');
        });
    }
};
