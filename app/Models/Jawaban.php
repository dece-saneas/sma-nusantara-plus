<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    
    protected $fillable = [
        'user_id', 'bhs', 'ing', 'mtk', 'ipa'
    ];
    
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
