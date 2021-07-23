<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    protected $table = 'identitas';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'nama_depan', 'nama_belakang', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'kewarganegaraan', 'anak_ke', 'jumlah_saudara_kandung', 'jumlah_saudara_tiri', 'status', 'alamat', 'kelurahan', 'kecamatan', 'kota', 'provinsi', 'kode_pos', 'negara', 'no_handphone', 'tinggal_dengan', 'jarak_ke_sekolah', 'kesekolah_dengan', 'gol_darah', 'penyakit', 'kelainan', 'tinggi', 'berat', 'nama_sekolah', 'alamat_sekolah', 'no_sstb', 'lama_belajar', 'dari_sekolah', 'alasan', 'iq', 'kesenian', 'olahraga', 'organisasi', 'karya'
    ];
    
    protected $dates = ['tanggal_lahir'];
    
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
