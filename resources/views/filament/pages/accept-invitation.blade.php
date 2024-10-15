<x-filament::page>
    <div class="max-w-xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">
            {{ __('Accepter l\'invitation') }}
        </h1>

        <div class="bg-white shadow rounded-lg p-6">
            <p class="mb-4">
                {{ __('Veuillez définir votre mot de passe pour activer votre compte.') }}
            </p>

            <form wire:submit.prevent="submit">
                {{ $this->form }}

                <x-filament::button type="submit" class="mt-4 w-full">
                    {{ __('Activer le compte') }}
                </x-filament::button>
            </form>
        </div>
    </div>
</x-filament::page>
