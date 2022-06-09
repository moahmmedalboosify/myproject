<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class private_request extends Model
{
    protected $table = 'private_request';
    protected $guarded = [] ;

    protected $casts = [
        'extra_features' => 'array',
        'address' => 'array'
    ];
}
