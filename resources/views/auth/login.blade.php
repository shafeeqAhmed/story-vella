<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @section('title')
        Login
    @stop

    <div class="main_container">
        <div class="container_1">
            <div class="header">
                <h1>Story Vella</h1>
            </div>
            <div class="main">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <x-custom-input-error :messages="$errors->get('email')" class="mt-2" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" placeholder="Email" />



                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />


                    <div>
                        <div class="auth_left_action">
                            <a href="{{ route('register') }}">Register</a>
                        </div>
                        <div class="auth_right_action">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forget Password?</a>
                            @endif
                        </div>
                    </div>


                    <button>Login</button>

                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
