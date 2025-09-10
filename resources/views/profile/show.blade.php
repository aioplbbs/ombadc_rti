<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="row">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="col-md-6">
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
                </div>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="col-md-6">
                @livewire('profile.update-password-form')

                <x-jet-section-border />
                </div>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
