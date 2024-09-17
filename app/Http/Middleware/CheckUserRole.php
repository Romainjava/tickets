<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        if (!Auth::check()) {
            return redirect()->to($this->getFilamentLoginUrl());
        }

        $user = $request->user();

        // Débogage : afficher les informations de l'utilisateur et des rôles
        //        dump([
        //            'User ID' => $user->id,
        //            'User Name' => $user->name,
        //            'User Roles' => $user->getRoleNames(),
        //            'Required Roles' => $roles,
        //            'Has Any Required Role' => $user->hasAnyRole($roles),
        //        ]);

        if (!$user->hasAnyRole($roles)) {
            abort(Response::HTTP_FORBIDDEN, 'Accès non autorisé.');
        }


        return $next($request);
    }

    protected function getFilamentLoginUrl(): string
    {
        $filamentPrefix = config('filament.path', 'tickets');
        $loginRoute = config('filament.auth.pages.login');

        // Si une route spécifique est définie pour la page de connexion
        if ($loginRoute && Route::has($filamentPrefix . '.auth.login')) {
            return route($filamentPrefix . '.auth.login');
        }

        // Sinon, construire l'URL manuellement
        return url($filamentPrefix . '/login');
    }
}
