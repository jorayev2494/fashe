<div class="wrap_header_mobile">
    <!-- Logo moblie -->
    <a href="{{ route('index') }}" class="logo-mobile">
        <img src="{{ asset('fashe') }}/images/icons/logo.png" alt="IMG-LOGO">
    </a>

    <!-- Button show menu -->
    <div class="btn-show-menu">
        <!-- Header Icon mobile -->
        <div class="header-icons-mobile">

            {{--  <a href="#" class="header-wrapicon1 dis-block">
                <img src="{{ asset('fashe') }}/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
            </a>  --}}

            @guest
                <span class="topbar-email m-r-13">
                    <a href="{{ route('login') }}">@lang("langue.sign_in")</a>
                </span>

                <a href="#" class="header-wrapicon1 dis-block">
                    <img src="{{ asset('fashe') }}/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>
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

                <a href="#" class="header-wrapicon1 dis-block m-l js-show-header-dropdown">
                    <img src="{{ auth()->user()->getAvatar() }}" style="border-radius: 50%;" class="header-icon1" alt="{{ auth()->user()->getAvatar() }}">
                </a>
                <!-- Header cart noti -->
                <div class="header-cart header-dropdown">
                    <ul class="header-cart-wrapitem">
                        <li class="header-cart-item">
                            <div class="header-cart-item-img">
                                <img src="{{ asset('fashe') }}/images/item-cart-01.jpg" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt">
                                <a href="#" class="header-cart-item-name">
                                    White Shirt With Pleat Detail Back
                                </a>

                                <span class="header-cart-item-info">
                                    1 x $19.00
                                </span>
                            </div>
                        </li>

                        <li class="header-cart-item">
                            <div class="header-cart-item-img">
                                <img src="{{ asset('fashe') }}/images/item-cart-02.jpg" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt">
                                <a href="#" class="header-cart-item-name">
                                    Converse All Star Hi Black Canvas
                                </a>

                                <span class="header-cart-item-info">
                                    1 x $39.00
                                </span>
                            </div>
                        </li>

                        <li class="header-cart-item">
                            <div class="header-cart-item-img">
                                <img src="{{ asset('fashe') }}/images/item-cart-03.jpg" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt">
                                <a href="#" class="header-cart-item-name">
                                    Nixon Porter Leather Watch In Tan
                                </a>

                                <span class="header-cart-item-info">
                                    1 x $17.00
                                </span>
                            </div>
                        </li>
                    </ul>

                    <div class="header-cart-total">
                        Total: $75.00
                    </div>

                    <div class="header-cart-buttons">
                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                View Cart
                            </a>
                        </div>

                        <div class="header-cart-wrapbtn">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                Check Out
                            </a>
                        </div>
                    </div>
                </div>

                {{--<div class="header-wrapicon2 m-r-13">
                    <span class="header-icon1 js-show-header-dropdown">
                        {{ auth()->user()->email }}
                    </span>

                     {{-- <!-- Header cart noti -->
                    <ul class="header-cart header-dropdown" style="width: 200px; padding: 8px;">
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
                    </ul>

                </div>--}}
            @endguest


            <span class="linedivide2"></span>

            {{-- Корзина сайта --}}
            @include("fashe.includes.cart")

        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
</div>
