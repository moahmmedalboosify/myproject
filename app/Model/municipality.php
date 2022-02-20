<?php

namespace App\Model;

use App\Model\region;
use Illuminate\Database\Eloquent\Model;

class municipality extends Model
{
    protected $table = 'municipality' ; 
    protected $guarded = [];

   

    public function regions()
    {
        return $this->hasMany(region::class);
    }

}
