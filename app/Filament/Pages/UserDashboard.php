<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.user-dashboard';


    protected static ?string $slug = 'user-dashboard';

    protected static ?int $navigationSort = 1;

    public function mount(): void
    {
        if (!Auth::user()->hasRole('client')) {
            abort(403, 'Accès non autorisé.');
        }
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return Auth::check() && Auth::user()->hasRole('client');
    }

    protected function getHeading(): string
    {
        return __('Client Dashboard');
    }

    protected function getViewData(): array
    {
        return [
            'welcomeMessage' => "Bienvenue, " . Auth::user()->name,
            'user' => Auth::user(),
        ];
    }
}
