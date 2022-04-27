<?php

namespace App\Model;
use Spatie\Permission\Traits\HasRoles;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\Expr\AssignOp\Mod;
use Illuminate\Database\Eloquent\Model;

class office_Account extends Authenticatable{
    
    use Notifiable;
    use HasRoles;

    protected  $guard  ="office";


    protected $table = 'office_account';
    protected $guarded = [] ;

    protected $casts = [
        'role' => 'array', 
        ];

}
