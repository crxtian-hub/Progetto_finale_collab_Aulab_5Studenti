<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RevisorForm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Se l'utente è già revisore, lo reindirizza alla home con un messaggio
        if (Auth::check() && Auth::user()->is_revisor) {
            return redirect()->route('welcome')->with('ErrorRevisorMessage', __('ui.you are already an auditor'));
        }

        // Se l'utente NON è revisore, può continuare
        return $next($request);
    }
}
