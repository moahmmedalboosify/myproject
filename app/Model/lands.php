<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lands extends Model
{
    protected $table = 'land' ; 
    protected $guarded = [] ;
    protected $casts = [
        'extra_features' => 'array',
        'pyment_method' => 'array'
    ];
}


