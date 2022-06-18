<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class client extends Authenticatable{


    protected $table = 'client' ; 
    protected $guarded = [] ;
}
