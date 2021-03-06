<?php

namespace App\Model;

use App\Model\office_info;
use App\Model\office_Account;
use Illuminate\Database\Eloquent\Model;

class offer_info extends Model
{
    
    protected $table = 'offer_info';
    protected $guarded = [] ;
    

    public function  user()
    {
        return $this->belongsTo('App\Model\office_Account','office_account_id', 'id');
    }

    public function  regions()
    {
        return $this->belongsTo(region::class,'region_id', 'id');
    }

    public function  clients()
    {
        return $this->belongsTo(office_clients::class,'office_client_id','id');
    }


    public function  office_infos()
    {
        return $this->belongsTo(office_info::class,'office_info_id','id');
    }

    public function preview_request_offer()
    {
        return $this->hasMany(preview_request::class,'offer_info_id');
    }




 

   
}
