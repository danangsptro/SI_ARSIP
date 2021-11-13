<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_surats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('index_id')->unsigned();
            $table->date('tanggal_pengajuan');
            $table->string('nama');
            $table->string('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('agama');
            $table->string('alamat');
            $table->string('status_surat')->nullable()->default('Belum Disetujui');
            $table->timestamps();

            $table->foreign('index_id')->references('id')->on('jenis_pengajuans')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_surats');
    }
}
