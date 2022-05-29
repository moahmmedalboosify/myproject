<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class apartment extends Model
{
    protected $table = 'apartment' ; 
    protected $guarded = [] ;
    protected $casts = [
        'extra_features' => 'array',
        'pyment_method' => 'array'
    ];

}
