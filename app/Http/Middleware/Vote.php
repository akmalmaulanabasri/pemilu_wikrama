<?php

namespace App\Http\Middleware;

use Closure;

class Vote
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
        if (auth()->user()->is_voting) {
            return redirect()->route('report.index')->with('danger', 'Anda sudah memilih calon ketua');
        }

        if (auth()->user()->is_admin == 1) {
            return redirect()->route('home')->with('danger', 'Anda tidak boleh memilih calon ketua');
        }
        
        return $next($request);
    }
}
