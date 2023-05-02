<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- PRENOM -->
        <div>
            <x-input-label for="prenom" :value="__('prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" maxlength="20"/>
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>
         <!-- Date de Naissance -->
<div class="mt-4">
    <x-input-label for="dateDeNaissance" :value="__('dateDeNaissance')" />
    <x-text-input id="dateDeNaissance" class="block mt-1 w-full" type="date" name="dateDeNaissance" :value="old('dateDeNaissance')" required autofocus autocomplete="dateDeNaissance" />
    <x-input-error :messages="$errors->get('dateDeNaissance')" class="mt-2" />
</div>
         <!--NUMERO DE TELEPHONE -->
         <div class="mt-4">
            <x-input-label for="numeroDeTelephone" :value="__('numeroDeTelephone')" />
            <x-text-input id="numeroDeTelephone" class="block mt-1 w-full" type="text" name="numeroDeTelephone" :value="old('Date De Naissance')" required autofocus autocomplete="numeroDeTelephone" />
            <x-input-error :messages="$errors->get('numeroDeTelephone')" class="mt-2" />
        </div>
        
         <!-- adresse -->
         <div>
            <x-input-label for="adresse" :value="__('adresse')" />
            <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required autofocus autocomplete="adresse" maxlength="20"/>
            <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
        </div>
        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>