<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AcceptInvitation extends Page
{
    use InteractsWithForms;
    
    protected static ?string $slug = 'accept-invitation/{token?}';

    protected static string $view = 'filament.pages.accept-invitation';

    public ?string $token = null;

    public function mount(?String $token): void
    {
        $this->token = $token;
    
        $user = User::where('invitation_token', $this->token)->firstOrFail();
    
        if ($user->hasVerifiedEmail()) {
            $this->redirect(config('filament.home_url', '/'));
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('password')
                ->password()
                ->required()
                ->minLength(8),
            Forms\Components\TextInput::make('password_confirmation')
                ->password()
                ->required()
                ->same('password'),
        ];
    }

    public function submit()
    {

        if (!$this->token) {
            // Gérer l'erreur : pas de token fourni
            $this->addError('token', __('No invitation token provided.'));
            return;
        }

        
        $data = $this->form->getState();

        $user = User::where('invitation_token', $this->token)
                    ->where('invitation_token_expires_at', '>', now())
                    ->firstOrFail();

        $user->update([
            'password' => Hash::make($data['password']),
            'invitation_token' => null,
            'invitation_token_expires_at' => null,
            'email_verified_at' => now(),
        ]);

        auth()->login($user);

        return redirect()->to(config('filament.home_url', '/'));
    }
}
