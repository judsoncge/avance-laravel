<?php

namespace App\Http\Middleware;

use Closure;

class StudentTypeCheck
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
		
		if ($request->user()->type != 'ALUNO') {
            return abort(403, "Acesso não autorizado");
        }
		
        return $next($request);
    }
}
