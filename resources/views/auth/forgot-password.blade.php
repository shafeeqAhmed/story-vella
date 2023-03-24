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
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Email"
                            :value="old('email')" required autofocus />
                        <x-custom-input-error :messages="$errors->get('email')" />
                    </div>

                    <button style="margin-left: 36px">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
