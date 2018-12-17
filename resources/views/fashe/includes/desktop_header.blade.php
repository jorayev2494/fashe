<div class="container-menu-header-v2 p-t-26">
    <div class="topbar2">
        {{-- Верхни блок сайт бара --}}
        <div class="topbar-social">
            @include("fashe.includes.socials")
        </div>

        <!-- Logo2 -->
        <a href="{{ route('index') }}" class="logo2">
            <img src="{{ asset('fashe') }}/images/icons/logo.png" alt="IMG-LOGO">
        </a>

        <div class="topbar-child2">
            @guest
                <span class="topbar-email">
                    <a href="{{ route('login') }}">@lang("langue.sign_in")</a>
                </span>
                {{--  |
                <span class="topbar-email">
                    <a href="{{ route('register') }}">@lang("langue.create_account")</a>
                </span> --}}
            @else
                <span class="topbar-email m-r-13">
                    <a href="{{ route('profile.show') }}">
                        {{ auth()->user()->email }}
                    </a>
                </span>

                <div class="header-wrapicon2 m-r-13">
                    {{--  <span class="header-icon1 js-show-header-dropdown">
                        {{ auth()->user()->email }}
                    </span>  --}}

                    <!-- Header cart noti -->
                    {{--  <ul class="header-cart header-dropdown" style="width: 200px; padding: 8px;">
                        <li class="header-cart-item">
                            <a href="{{ route('profile.show') }}" class="dropdown-item">White</a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="
                                event.preventDefault();
                                document.getElementById('logout-form').submit();
                            ">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>  --}}
                </div>
            @endguest


            {{-- <div class="topbar-language rs1-select2">
                <select class="selection-1" name="time">
                    <option>USD</option>
                    <option>EUR</option>
                </select>
            </div> --}}

            @guest
                <a href="#" class="header-wrapicon1 dis-block m-l-30">
                    <img src="{{ asset('fashe') }}/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>
            @else
                <div class="header-wrapicon2 m-r-13">
                    <a href="#" class="header-wrapicon1 dis-block m-l js-show-header-dropdown">  {{-- m-l-30 --}}
                        <img src="{{ auth()->user()->getAvatar() }}" class="header-icon1" alt="ICON" style="border-radius: 50%;">
                    </a>

                    <!-- Header cart noti -->
                    <ul class="header-cart header-dropdown" style="width: 200px; padding: 8px;">
                        <li class="header-cart-item">
                            <a href="{{ route('profile.show') }}" class="dropdown-item">
                                @lang("langue.private_cabinet")
                            </a>

                            @if (auth()->user()->role->prefix == "admin")
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                    @lang("langue.admin_panel")
                                </a>
                            @elseif(auth()->user()->role->prefix == "moderator")
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                    @lang("langue.moderator_panel")
                                </a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="
                                event.preventDefault();
                                document.getElementById('logout-form').submit();
                            ">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest

            <span class="linedivide1"></span>

            {{-- Корзина сайта --}}
            @include("fashe.includes.cart")

        </div>
    </div>

    <div class="wrap_header">

        <!-- Menu -->
        {{--  Менью полый версии сайта  --}}
        @include("fashe.includes.desktop_menu")

        <!-- Header Icon -->
        <div class="header-icons">
        </div>
        
    </div>
</div>
