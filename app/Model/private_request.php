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

    public function  offices()
    {
        return $this->belongsTo(office_info::class,'office_info_id', 'id');
    }
}      

