<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                

                // Vérifier si l'utilisateur a un email vérifié
                if ($user->email_verified_at !== null) {
                    // Rediriger vers le tableau de bord si l'email est vérifié
                    return redirect(RouteServiceProvider::HOME);
                } elseif ($user->invitation_token) {
                    // Rediriger vers la page d'acceptation d'invitation si le token existe
                    return redirect()->route('filament.pages.accept-invitation', ['token' => $user->invitation_token]);
                }
                
                // Si l'email n'est pas vérifié et qu'il n'y a pas de token d'invitation, 
                // vous pouvez rediriger vers une page de vérification d'email ou le tableau de bord
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
