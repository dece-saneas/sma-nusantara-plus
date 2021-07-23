<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    protected $table = 'gelombang';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_period', 'end_period', 'total_quota', 'remaining_quota', 'fee',
    ];
    
    protected $dates = ['start_period', 'end_period'];
    
    public function user()
    {
    	return $this->hasMany('App\Models\User');
    }
}
