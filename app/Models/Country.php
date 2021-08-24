<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number', 'alpha2', 'alpha3', 'langEN', 'langDE', 'langES', 'langFR', 'tld'
    ];
}
