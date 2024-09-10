<x-guest-layout>
    <!-- Container for the form -->
    <div class="  items-center justify-center ">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <img src="/images/Logo.png" alt="Logo" class="w-32 h-32 mx-auto">

            <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Login</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Senha')" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-md" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#764a9b] shadow-sm focus:ring-pink-500" name="remember">
                        <span class="ms-2 text-sm text-[#764a9b]">{{ __('Lembrar') }}</span>
                    </label>
                </div>

                <!-- Forgot Password & Login Button -->
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-[#764a9b] hover:text-[#e5c7ff] underline" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-[#764a9b] hover:bg-[#e5c7ff] text-white px-4 py-2 rounded-full">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
