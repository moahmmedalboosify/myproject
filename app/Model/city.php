<?php

namespace App\Model;

use App\Model\municipality;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = 'city' ; 
    protected $guarded = [] ;


    public function municipalities()
    {
        return $this->hasMany(municipality::class);
    }
}
