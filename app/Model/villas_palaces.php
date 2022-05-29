<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class villas_palaces extends Model
{
    protected $table = 'villas_palaces';
     
    protected $guarded = [] ;
    protected $casts = [
        'extra_features' => 'array',
        'pyment_method' => 'array'
    ];
    
}
