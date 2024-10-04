<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Illuminate\Support\Facades\URL;
use App\Filament\Resources\UserInvitationResource\Pages;

class UserInvitationResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-add';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('invitation_token'),
                Tables\Columns\TextColumn::make('invitation_token_expires_at'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('invite')
                    ->action(function (User $record) {
                        $record->update([
                            'invitation_token' => Str::random(60),
                            'invitation_token_expires_at' => now()->addDay(),
                        ]);

                        // Générer l'URL d'invitation
                        $invitationUrl = URL::signedRoute('filament.pages.accept-invitation', ['token' => $record->invitation_token]);

                        // Envoyer un e-mail d'invitation avec le lien
                        // Utilisez votre logique d'envoi d'e-mail ici

                        Notification::make()
                            ->title('Invitation envoyée')
                            ->body("Une invitation a été envoyée à {$record->email}")
                            ->actions([
                                Action::make('view')
                                    ->button()
                                    ->url($invitationUrl)
                            ])
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserInvitations::route('/'),
            'create' => Pages\CreateUserInvitation::route('/create'),
        ];
    }    
}