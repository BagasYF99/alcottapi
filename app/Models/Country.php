<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function Province()
    {
        return $this->hasMany(Province::class);
    }

    public function scopeCountryFilter($query)
    {
        if(request('search')){
            // dd('masuk');
            return $query->where('name', 'like', '%'.request('search').'%');
        }
    }
}
