<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class preview_request extends Model
{
    protected $table = 'preview_requests';
    protected $guarded = [] ;
    
    public function  offices()
    {
        return $this->belongsTo(office_info::class,'office_info_id', 'id');
    }

    public function  offer()
    {
        return $this->belongsTo(offer_info::class,'offer_info_id', 'id');
    }
}
