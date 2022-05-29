<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class houses extends Model
{
    protected $table = 'houses' ; 
    
    protected $guarded = [] ;

    protected $casts = [
        'extra_features' => 'array',
        'pyment_method' => 'array'
    ];
}
