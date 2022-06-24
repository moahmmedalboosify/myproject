<?php

namespace App\Model;
use App\Model\offer_info;


use PhpParser\Node\Expr\AssignOp\Mod;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class office_Account extends Authenticatable{
    
    use Notifiable;
    use HasRoles;

    protected  $guard  ="office";


    protected $table = 'office_account';
    protected $guarded = [] ;

    // protected $casts = [
    //     'role' => 'array', 
    //     ];
    public function offers()
    {
        return $this->hasMany(offer_info::class,'office_account_id');
    }

    public function client_offices()
    {
        return $this->hasMany(office_clients::class,'office_client_id');
    }
    
    public function  office_infos()
    {
        return $this->belongsTo(office_info::class,'office_info_id', 'id');
    }

}
