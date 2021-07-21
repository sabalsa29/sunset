<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthUser
{

    public function handle($request, Closure $next)
    {


        return redirect('home');

    }


}
