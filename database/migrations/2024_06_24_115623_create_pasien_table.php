<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('nama', 100);
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin', 10);
            $table->string('nik', 16)->unique();
            $table->string('alamat', 255);
            $table->string('telepon', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->date('tanggal_pendaftaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
};
