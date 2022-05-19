<?php

namespace App\Model;

use App\Model\region;
use App\Model\municipality;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = 'city' ; 
    protected $guarded = [] ;


    public function region()
    {
        return $this->hasMany(region::class);
    }
}
