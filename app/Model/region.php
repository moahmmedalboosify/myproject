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
        return $this->belongsTo(city::class);
    }

}

