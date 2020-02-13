<nav class="navbar" role="navigation" style="direction: {{auth()->check() && $user->locale ? 'rtl' : 'ltr'}}">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ route('home') }}" class="navbar-item" tabindex="1" style="margin-bottom:0"><img src="{{asset('storage/icons/balance-logo.png')}}" alt=""></a>
            <div class="navbar-burger burger {{auth()->check() && $user->locale ? 'rtl-navbar' : ''}}" onclick="document.querySelector('.navbar-menu').classList.toggle('is-active'); this.classList.toggle('is-active');">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start {{auth()->check() && $user->locale ? 'rtl-navbar' : ''}}"></div>
            <div class="navbar-end {{auth()->check() && $user->locale ? 'rtl-navbar' : ''}}">
                @guest
                    @include('partials.language-dropdown')
                    <div class="navbar-item has-text-centered">
                        <a href="{{ route('login') }}" style="margin-bottom: 0;">{{__('general.login')}}</a>
                    </div>
                    <div class="navbar-item has-text-centered">
                        <a  href="{{ route('register') }}">{{__('general.register')}}</a>
                    </div>
             @endguest
                @auth
                        @include('partials.language-dropdown')
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link has-text-centered" href="#" style="margin-bottom: 0;">{{ Auth::user()->name }}</a>
                        <div class="navbar-dropdown">
                            <div class="navbar-item has-text-centered">
                                <a  href="{{ route('budget.index') }}">{{__('general.budget')}}</a>
                            </div>
                            <div class="navbar-item has-text-centered">
                                <a  href="{{ route('types.index') }}">{{__('general.manage-types')}}</a>
                            </div>
                            <a class="navbar-item subtitle is-5 has-text-centered" style="margin-bottom: 0;" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{__('general.logout')}}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
