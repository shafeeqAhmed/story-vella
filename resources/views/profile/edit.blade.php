
    <x-dashboard-layout>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        @section('title')
            Profile
        @stop

        <div class="main_container">


                <div class="header">
                    <h1></h1>
                </div>
                <div class="main">
                    @include('profile.partials.update-password-form')
                </div>
        </div>
        </x-dashboard-layout>
