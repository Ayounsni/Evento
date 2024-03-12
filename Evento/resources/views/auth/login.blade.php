<x-layout>
    @include('profile.partials.nav') 

    <div class=" mt-28 px-6"> 
    <x-guest-layout>
       
        {{-- @if(session('error'))
        <div class="alert self-center alert-danger mt-3 text-center w-75">
             {{ session('error') }}
        </div>
        @endif --}}
        <!-- Session Status -->
        @if(session('error'))
    <div class="rounded-md bg-red-50 p-4 self-center mb-2 w-100">
        <div class="flex">
            <div class="flex-shrink-0">
                <!-- Nouvelle icône d'erreur -->
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v.01M8 8h.01M12 8h.01M16 8h.01M8 12h.01M16 12h.01M8 16h.01M12 16h.01M16 16h.01M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-red-800">
                    {{ session('error') }}
                </p>
            </div>
        </div>
    </div>
@endif

        
        <x-auth-session-status class="mb-4 " :status="session('status')" />
        <div class="d-flex justify-content-start ">
            <a href="/" class="bg-gray-800 hover:bg-gray-700 rounded-lg px-2 text-gray-100"><i class="bi bi-skip-backward-fill"></i></a>
        </div>
        <div class="d-flex justify-content-center ">
            <img src="{{ asset('image/logo1.png') }}" class="h-10 mb-4" alt=" Logo">
        </div>
       
    
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mot de passe')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    

    
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif
    
                <x-primary-button class="ms-3">
                    {{ __('Se connecter') }}
                </x-primary-button>
            </div>
        </form>
    
    </x-guest-layout>
    </div>
    </x-layout>
    