<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id', 'name', 'man_population', 'woman_population'
    ];

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }

    public function scopeProvinceFilter($query)
    {
        if(request('search')){
            // dd('masuk');
            return $query->where('name', 'like', '%'.request('search').'%');
        }
    }
}
