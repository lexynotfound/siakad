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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('roles')->after('email')->default('mahasiswa');
            $table->date('tgl_lahir')->after('roles')->nullable();
            $table->string('phone')->after('tgl_lahir')->nullable();
            $table->string('address')->after('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('roles');
            $table->dropColumn('tgl_lahir');
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
};
