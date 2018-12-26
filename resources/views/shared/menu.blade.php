<div class="app header-default side-nav-dark">
    <div class="layout">
        <div class="header navbar">
            <div class="header-container">
                <div class="nav-logo">
                    <a href="index.html">
                        <div class="logo logo-dark"></div>
                        <div class="logo logo-white"></div>
                    </a>
                </div>
                <ul class="nav-left">
                    <li>
                        <a class="sidenav-fold-toggler" href="javascript:void(0);">
                            <i class="mdi mdi-menu"></i>
                        </a>
                        <a class="sidenav-expand-toggler" href="javascript:void(0);">
                            <i class="mdi mdi-menu"></i>
                        </a>
                    </li>
                    <li class="search-box">
                        <a class="search-toggle" href="javascript:void(0);">
                            <i class="search-icon mdi mdi-magnify"></i>
                            <i class="search-icon-close mdi mdi-close-circle-outline"></i>
                        </a>
                    </li>
                    <li class="search-input">
                        <input class="form-control" type="text" placeholder="{{ __('eng.placeholder_search') }}">
                    </li>
                </ul>
                <ul class="nav-right">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</div>
