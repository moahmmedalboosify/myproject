<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class commercial extends Model
{
    protected $table = 'commercial';
     
    protected $guarded = [] ;

    protected $casts = [
        'extra_features' => 'array',
        'pyment_method' => 'array'
    ];
}
