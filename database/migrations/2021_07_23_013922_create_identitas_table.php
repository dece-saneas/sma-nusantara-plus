<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            
            $table->string('nama_depan',50);
            $table->string('nama_belakang',50);
            $table->string('jenis_kelamin',10);
            $table->string('tempat_lahir',50);
            $table->dateTime('tanggal_lahir');
            $table->string('agama',10);
            $table->string('kewarganegaraan',20);
            $table->string('anak_ke',10);
            $table->string('jumlah_saudara_kandung',10);
            $table->string('jumlah_saudara_tiri',10)->nullable();
            $table->string('status',15);
            
            $table->string('alamat',50);
            $table->string('kelurahan',25);
            $table->string('kecamatan',25);
            $table->string('kota',25);
            $table->string('provinsi',25);
            $table->string('kode_pos',10);
            $table->string('negara',25);
            $table->string('no_handphone',15);
            $table->string('tinggal_dengan',25);
            $table->string('jarak_ke_sekolah',15)->nullable();
            $table->string('kesekolah_dengan',15)->nullable();
            
            $table->string('gol_darah',5);
            $table->string('penyakit',25)->nullable();
            $table->string('kelainan',25)->nullable();
            $table->string('tinggi',5);
            $table->string('berat',5);
            
            $table->string('nama_sekolah',25)->nullable();
            $table->string('alamat_sekolah',50)->nullable();
            $table->string('no_sstb',25)->nullable();
            $table->string('lama_belajar',25)->nullable();
            $table->string('dari_sekolah',25)->nullable();
            $table->string('alasan',100)->nullable();
            
            $table->string('iq',5)->nullable();
            $table->string('kesenian',25)->nullable();
            $table->string('olahraga',25)->nullable();
            $table->string('organisasi',25)->nullable();
            $table->string('karya',25)->nullable();
            
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
        Schema::dropIfExists('identitas');
    }
}
