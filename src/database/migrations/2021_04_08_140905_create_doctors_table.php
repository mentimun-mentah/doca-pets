<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('no_str')->unique();
            $table->string('sertif');
            $table->string('surat_izin');
            $table->string('nama_klinik')->nullable();
            $table->string('spesialis')->nullable();
            $table->string('spesialis_singkatan',20)->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('lokasi')->nullable();
            $table->text('pengalaman_praktik')->nullable();
            $table->text('riwayat_pendidikan')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('doctors', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
