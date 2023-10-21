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
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->datetime('schedule_date');
            $table->string('schedule_type');
            $table->timestamps();

            /*
                Membuat Sebuah Foreignkey
             */
            // membuat sebuah foreign key mahasiwa berdasakrn tabel users
            $table->foreign('student_id', 'studentid_foreign')->references('id')->on('users');
             // membuat sebuah foreign key matakuliah berdasakrn tabel subject
            $table->foreign('subject_id', 'subjectid_foreign')->references('id')->on('subjects');
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
