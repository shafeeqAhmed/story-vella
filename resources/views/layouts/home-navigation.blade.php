<div class="site_header">
    <div class="container">
        <div class="header">
            <div class="site_logo">
                <h1>Story Vella</h1>
            </div>
            <div class="site_nav">
                <ul>
                    <li><a href="stories.html">stories</a></li>
                    @if (Auth::check())
                        <li>
                            <a href="{{route('profile.edit') }}">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>

                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                </ul>
            </div>
            <div class="site_btn">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </div>
</div>
