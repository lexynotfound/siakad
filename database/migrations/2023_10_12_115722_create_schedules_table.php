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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            /*
                Membuat Sebuah Foreignkey
             */
             // membuat sebuah foreign key matakuliah berdasakrn tabel subject
            $table->foreignId('subject_id')->constrained('subjects');
            /* $table->foreignId('student_id')->constrained('users'); */
            $table->string('day');
            $table->string('date_start');
            $table->string('date_end');
            $table->string('room');
            $table->string('attendance_code');
            $table->string('academic_year');
            $table->string('semester');
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
        Schema::dropIfExists('schedules');
    }
};
