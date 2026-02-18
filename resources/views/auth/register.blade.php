<x-guest-layout>
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md mt-8 py-12 shadow-purple-500/50">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="first_name" :value="__('first name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-input-label for="last_name" :value="__('last name')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <!-- Born At -->
            <div class="mt-4">
                <x-input-label for="born_at" :value="__('Born At')" />
                <x-text-input
                    id="born_at"
                    class="block mt-1 w-full"
                    type="date"
                    name="born_at"
                    :value="old('born_at')"
                    required
                    autofocus
                    autocomplete="born_at"
                />
                <x-input-error :messages="$errors->get('born_at')" class="mt-2" />
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
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
 
            <div class="mt-4">
                <x-primary-button class="w-full bg-purple-600 hover:bg-purple-700">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

        <div>
            <flux:text class="mt-5">
                Already have an account?  
                <flux:link href="{{ route('login') }}">Sign in</flux:link>
            </flux:text>

        </div>
    </div>
</x-guest-layout>
