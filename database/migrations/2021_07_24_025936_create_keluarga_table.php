<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            
            $table->string('nama_ayah',50)->nullable();
            $table->string('tempat_lahir_ayah',25)->nullable();
            $table->dateTime('tanggal_lahir_ayah')->nullable();
            $table->string('agama_ayah',25)->nullable();
            $table->string('kewarganegaraan_ayah',25)->nullable();
            $table->string('pendidikan_ayah',25)->nullable();
            $table->string('pekerjaan_ayah',25)->nullable();
            $table->string('penghasilan_ayah',25)->nullable();
            $table->string('alamat_ayah',50)->nullable();
            $table->string('kelurahan_ayah',25)->nullable();
            $table->string('kecamatan_ayah',25)->nullable();
            $table->string('kota_ayah',25)->nullable();
            $table->string('provinsi_ayah',25)->nullable();
            $table->string('kode_pos_ayah',10)->nullable();
            $table->string('negara_ayah',25)->nullable();
            $table->string('no_handphone_ayah',15)->nullable();
            
            $table->string('nama_ibu',50)->nullable();
            $table->string('tempat_lahir_ibu',25)->nullable();
            $table->dateTime('tanggal_lahir_ibu')->nullable();
            $table->string('agama_ibu',25)->nullable();
            $table->string('kewarganegaraan_ibu',25)->nullable();
            $table->string('pendidikan_ibu',25)->nullable();
            $table->string('pekerjaan_ibu',25)->nullable();
            $table->string('penghasilan_ibu',50)->nullable();
            $table->string('alamat_ibu',50)->nullable();
            $table->string('kelurahan_ibu',25)->nullable();
            $table->string('kecamatan_ibu',25)->nullable();
            $table->string('kota_ibu',25)->nullable();
            $table->string('provinsi_ibu',25)->nullable();
            $table->string('kode_pos_ibu',10)->nullable();
            $table->string('negara_ibu',25)->nullable();
            $table->string('no_handphone_ibu',55)->nullable();
            
            $table->string('nama_wali',50);
            $table->string('tempat_lahir_wali',25);
            $table->dateTime('tanggal_lahir_wali');
            $table->string('agama_wali',25);
            $table->string('kewarganegaraan_wali',25);
            $table->string('pendidikan_wali',25);
            $table->string('pekerjaan_wali',25);
            $table->string('penghasilan_wali',25);
            $table->string('alamat_wali',50);
            $table->string('kelurahan_wali',25);
            $table->string('kecamatan_wali',25);
            $table->string('kota_wali',25);
            $table->string('provinsi_wali',25);
            $table->string('kode_pos_wali',10);
            $table->string('negara_wali',25);
            $table->string('no_handphone_wali',15);
            
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluarga');
    }
}
