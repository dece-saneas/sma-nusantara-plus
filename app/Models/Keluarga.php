<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluarga';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'nama_ayah', 'tempat_lahir_ayah', 'tanggal_lahir_ayah', 'agama_ayah', 'kewarganegaraan_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'alamat_ayah', 'kelurahan_ayah', 'kecamatan_ayah', 'kota_ayah', 'provinsi_ayah', 'kode_pos_ayah', 'negara_ayah', 'no_handphone_ayah', 'nama_ibu', 'tempat_lahir_ibu', 'tanggal_lahir_ibu', 'agama_ibu', 'kewarganegaraan_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'alamat_ibu', 'kelurahan_ibu', 'kecamatan_ibu', 'kota_ibu', 'provinsi_ibu', 'kode_pos_ibu', 'negara_ibu', 'no_handphone_ibu', 'nama_wali', 'tempat_lahir_wali', 'tanggal_lahir_wali', 'agama_wali', 'kewarganegaraan_wali', 'pendidikan_wali', 'pekerjaan_wali', 'penghasilan_wali', 'alamat_wali', 'kelurahan_wali', 'kecamatan_wali', 'kota_wali', 'provinsi_wali', 'kode_pos_wali', 'negara_wali', 'no_handphone_wali'
    ];
    
    protected $dates = ['tanggal_lahir_ayah', 'tanggal_lahir_ibu', 'tanggal_lahir_wali'];
    
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
