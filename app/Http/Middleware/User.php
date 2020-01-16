<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;
use Closure;

class User
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
        if (isset(Auth::user()->id)){
            $id = Auth::user()->id;
            $user = DB::table('utilisateur') ->find($id);
            if (auth()->check() && !($user->admin)) {
                return $next($request);
            }
        }

        return redirect('/connexion')->with('error', 'Client introuvable');

    }
}
