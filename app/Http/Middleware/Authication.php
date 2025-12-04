<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //checar se o usuario esta logado
        //passos
        //1. verificar se o usuario nao existe na session
        //2. redirecionar para a rota de realizar login

        if(!session('user')){
            return redirect('/login');
        }

        return $next($request);
    }
}
