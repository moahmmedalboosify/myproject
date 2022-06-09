<?php

namespace App\Model;

use App\Model\city;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    protected $table = 'region' ; 
    protected $guarded = [] ;

    public function cities()
    {
        return $this->belongsTo(city::class,'city_id');
    }

    
    public function offer_region()
    {
        return $this->hasMany(offer_info::class,'region_id');
    }

}

