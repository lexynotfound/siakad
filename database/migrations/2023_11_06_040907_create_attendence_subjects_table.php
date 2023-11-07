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
        Schema::create('attendence_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained('schedules');
            $table->foreignId('student_id')->constrained('users');
            $table->string('attendence_code');
            $table->string('academic_year');
            $table->string('semester');
            $table->string('pertemuan');
            $table->string('status');
            $table->string('keterangan')->nullable();
            // latitued
            $table->string('latitude');
            // longtitude
            $table->string('longitude');
            //nilai
            $table->string('nilai')->nullable();
            $table->string('created_by');
            $table->string('updated_by');
            $table->string('deleted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendence_subjects');
    }
};
