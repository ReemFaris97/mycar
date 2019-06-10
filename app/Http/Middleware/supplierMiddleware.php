<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class supplierMiddleware
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

        if(auth()->check() && auth()->user()->type =='supplier'){
            if(auth()->user()->is_active != 1){
                $reason = auth()->user()->suspend_reason;
                session()->flash('suspendError',['reason'=>$reason]);
                Auth::logout();
                return redirect(route('supplier.login'));
            }
        }
        else{
            return redirect(route('supplier.login'));
        }
        return $next($request);
    }
}
