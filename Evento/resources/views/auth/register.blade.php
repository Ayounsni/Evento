<x-layout>
    <div class="min-h-screen">
    @include('profile.partials.nav')
    <div class="px-6">  
<x-guest-layout>
    <div class="d-flex justify-content-start ">
        <a href="/" class="bg-gray-800 hover:bg-gray-700 rounded-lg px-2 text-gray-100"><i class="bi bi-skip-backward-fill"></i></a>
    </div>
    <div class="d-flex justify-content-center ">
        <img src="{{ asset('image/logo1.png') }}" class="h-10 mb-4" alt=" Logo">
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Je suis :</label>
        <div class="flex justify-around">
        <div class="flex items-center">
            <input type="checkbox" name="role" value="user" id="option1" class="form-checkbox text-indigo-600 h-5 w-5">
            <label for="option1"  class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Participant</label>
          </div>
          <div class="flex items-center mt-2">
            <input type="checkbox" name="role" value="organisateur" id="option2" class="form-checkbox text-indigo-600 h-5 w-5">
            <label for="option2" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Organisateur</label>
          </div>
        </div>
        <x-input-error :messages="$errors->get('role')" class="mt-2" />
       </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer Mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Déjà inscrit(e)?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __("S'inscrire") }}
            </x-primary-button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
          $('input[type="checkbox"]').not(this).prop('checked', false);
        });
      });
    </script>
</x-guest-layout>
</div>
</x-layout>
