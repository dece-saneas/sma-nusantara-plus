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
            
            $table->string('jenis_kelamin',10)->nullable();
            $table->string('tempat_lahir',50)->nullable();
            $table->dateTime('tanggal_lahir')->nullable();
            $table->string('agama',10)->nullable();
            $table->string('kewarganegaraan',20)->nullable();
            $table->string('anak_ke',10)->nullable();
            $table->string('jumlah_saudara_kandung',10)->nullable();
            $table->string('jumlah_saudara_tiri',10)->nullable();
            $table->string('status',15)->nullable();
            
            $table->string('alamat',50)->nullable();
            $table->string('kelurahan',25)->nullable();
            $table->string('kecamatan',25)->nullable();
            $table->string('kota',25)->nullable();
            $table->string('provinsi',25)->nullable();
            $table->string('kode_pos',10)->nullable();
            $table->string('negara',25)->nullable();
            $table->string('no_handphone',15)->nullable();
            $table->string('tinggal_dengan',25)->nullable();
            $table->string('jarak_ke_sekolah',15)->nullable();
            $table->string('kesekolah_dengan',15)->nullable();
            
            $table->string('gol_darah',5)->nullable();
            $table->string('penyakit',25)->nullable();
            $table->string('kelainan',25)->nullable();
            $table->string('tinggi',5)->nullable();
            $table->string('berat',5)->nullable();
            
            $table->string('nama_sekolah',25)->nullable();
            $table->string('alamat_sekolah',50)->nullable();
            $table->string('no_sttb',25)->nullable();
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
