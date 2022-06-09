<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class office_info extends Model
{
    

    protected $table = 'office_info';
    protected $guarded = [] ;

       
    public function offer_info()
    {
        return $this->hasMany(offer_info::class,'office_info_id');
    }
}
