<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class ControlPanel
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
        if(auth()->check() && auth()->user()->hasAnyRole()){

            if(auth()->user()->is_active != 1){
                $reason = auth()->user()->suspend_reason;
                Auth::logout();
                session()->flash('suspendError',['reason'=>$reason]);
                return redirect(route('admin.login'));
            }

        }
        else{
            return redirect(route('admin.login'));
        }
        return $next($request);
    }
}
