<div class="site_header">
    <div class="container">
        <div class="header">
            <div class="site_logo">
                <h1>
                    <a class="main_heading_nav" href="{{route('home')}}">
                        Story Vella
                    </a>
                </h1>
            </div>
            <div class="site_nav">
                <ul>

                    @if (Auth::check())

                    <li>
                        <a href="{{ route('dashboard') }}">
                            dashboard
                        </a>
                    </li>
                    <li><a href="{{ route('admin.stories')}}">stories</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('logout') }}
                                </x-responsive-nav-link>
                            </form>

                        </li>
                        <li>
                            <a href="{{route('profile.edit') }}">
                                {{ Auth::user()->name }}
                                @if(Auth::user()->hasRole('admin'))
                                (Admin)
                                @elseif(Auth::user()->hasRole('reader'))
                                (Reader)
                                @elseif(Auth::user()->hasRole('writer'))
                                (Writer)
                                @endif
                            </a>
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
