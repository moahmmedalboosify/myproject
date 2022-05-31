<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class offer_info extends Model
{
    
    protected $table = 'offer_info';
    protected $guarded = [] ;
    

    public function  users()
    {
        return $this->belongsTo(office_Account::class,'id');
    }

    public function  regions()
    {
        return $this->belongsTo(region::class,'id');
    }

    public function  clients()
    {
        return $this->belongsTo(office_clients::class,'id');
    }
}
