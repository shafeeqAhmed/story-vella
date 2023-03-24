<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @section('title')
        Register
    @stop

    <div class="main_container">
        <div class="container_1">
            <div class="header">
                <h1>Story Vella</h1>
            </div>
            <div class="main">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" placeholder="User Name" />
                        <x-custom-input-error :messages="$errors->get('name')" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="username" placeholder="Email" />
                        <x-custom-input-error :messages="$errors->get('email')" />
                    </div>

                    <!-- Password -->
                    <div>

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                            placeholder="Password" required autocomplete="new-password" />

                        <x-custom-input-error :messages="$errors->get('password')" />
                    </div>

                    <!-- Confirm Password -->
                    <div>

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" placeholder="Confirm Password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-custom-input-error :messages="$errors->get('password_confirmation')" />
                    </div>

                      <!-- Confirm Password -->
                      <div>

                        <select class="select_option" name='role'>
                            <option value="writer">Writer</option>
                            <option value="reader">Reader</option>
                        </select>
                    </div>






                    {{-- <br>
                    <input type="text" placeholder="Password"> --}}
                    <br>
                    <span style="margin-left: 15%;"><a href="{{ route('login') }}">Login?</a></span>
                    <button>Register</button>

                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
