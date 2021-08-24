<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    protected $table = 'berkas';
    
    protected $fillable = [
        'user_id', 'photo', 'photo_status', 'photo_notes', 'surat_ket_sehat', 'surat_ket_sehat_status', 'surat_ket_sehat_notes', 'payment', 'payment_status', 'payment_notes'
    ];
    
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
