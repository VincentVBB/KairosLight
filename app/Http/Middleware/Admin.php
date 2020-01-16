<?php

namespace App\Http\Middleware;
use Closure;

use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;


class Admin
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
        if (isset(Auth::user()->id)) {
            $id = Auth::user()->id;
            $user = DB::table('utilisateur')->find($id);
            if (auth()->check() && $user->admin) {
                return $next($request);
            }
        }
        return redirect('/connexionAdmin');

    }


}
