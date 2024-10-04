<?php

use App\Filament\Pages\UserDashboard;
use App\Http\Middleware\CheckUserRole;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Facades\Route;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use App\Http\Controllers\RoadMap\DataController;
use App\Http\Controllers\Auth\OidcAuthController;
use App\Filament\Pages\AcceptInvitation;
use App\Filament\Resources\UserInvitationResource;

// Route::get('/', UserDashboard::class)
//     ->middleware([
//         'web',
//         DispatchServingFilamentEvent::class,
//        'role:client'
//     ])->name('user-dashboard');

// Share ticket
Route::get('/tickets/share/{ticket:code}', function (Ticket $ticket) {
    return redirect()->to(route('filament.resources.tickets.view', $ticket));
})->name('filament.resources.tickets.share');

// Validate an account
Route::get('/validate-account/{user:creation_token}', function (User $user) {
    return view('validate-account', compact('user'));
})
    ->name('validate-account')
    ->middleware([
        'web',
        DispatchServingFilamentEvent::class
    ]);

// Login default redirection
Route::redirect('/login-redirect', '/login')->name('login');

// Road map JSON data
Route::get('road-map/data/{project}', [DataController::class, 'data'])
    ->middleware(['verified', 'auth'])
    ->name('road-map.data');

Route::name('oidc.')
    ->prefix('oidc')
    ->group(function () {
        Route::get('redirect', [OidcAuthController::class, 'redirect'])->name('redirect');
        Route::get('callback', [OidcAuthController::class, 'callback'])->name('callback');
    });

// Remplacer les anciennes routes d'invitation par les nouvelles
Route::get('/user-invitations', [UserInvitationResource::class, 'index'])->name('user-invitations.index');
Route::get('/user-invitations/create', [UserInvitationResource::class, 'create'])->name('user-invitations.create');
Route::post('/user-invitations', [UserInvitationResource::class, 'store'])->name('user-invitations.store');

Route::get('/accept-invitation/{token}', AcceptInvitation::class)->name('filament.pages.accept-invitation');
