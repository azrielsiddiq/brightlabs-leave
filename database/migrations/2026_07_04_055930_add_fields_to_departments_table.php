<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->string('kode_departemen')->after('id');
            $table->text('deskripsi_tugas')->nullable()->after('nama_departemen');
        });
    }

    public function down(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn([
                'kode_departemen',
                'deskripsi_tugas',
            ]);
        });
    }
};