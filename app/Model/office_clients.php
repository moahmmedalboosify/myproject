<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class office_clients extends Model
{
    protected $table = 'office_client' ;

    protected $guarded = [] ;
    

    public function offer_clients()
    {
        return $this->hasMany(offer_info::class,'office_client_id');
    }



    public function  office_accounts()
    {
        return $this->belongsTo(office_Account::class,'office_account_id', 'id');
    }


}
