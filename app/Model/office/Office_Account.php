<?php

namespace App\Model\office;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\Expr\AssignOp\Mod;
use Illuminate\Database\Eloquent\Model;

class Office_Account extends Authenticatable{

    protected  $guard  ="office";

    protected $table = 'office_account';
    protected $guarded = [] ;

}
