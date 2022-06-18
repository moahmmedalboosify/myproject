<?php

namespace App\Http\Middleware;

use App\Model\office_Account;
use App\Model\office_info;
use Closure;

class checkStateOffice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       
        $office =office_Account::where('email',$request->email)->with('office_infos')->get()->toArray();

        

        if($office[0]['office_infos']['state'] == 0)
        {
            return redirect()->route('office.show_subscripe',['id' => $office[0]['office_infos']['id']]);
        }
        return $next($request);
    }
}
