<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $title }}</title>
        <meta charset="UTF-8">
        {{-- <!-- CSRF Token --> --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--===============================================================================================-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="{{ asset('fashe') }}/images/icons/favicon.png"/>

        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->

        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/fonts/themify/themify-icons.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/fonts/elegant-font/html-css/style.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/vendor/slick/slick.css">
        <!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/vendor/noui/nouislider.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/vendor/lightbox2/css/lightbox.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/css/util.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('fashe') }}/css/main.css">
        <!--===============================================================================================-->
    </head>
    <body class="animsition">
        {{--  <!-- header fixed -->
        <div class="wrap_header fixed-header2 trans-0-4">
            <!-- Logo -->
            <a href="{{ route('index') }}" class="logo">
                <img src="{{ asset('fashe') }}/images/icons/logo.png" alt="IMG-LOGO">
            </a>

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="index.html">Home</a>
                            <ul class="sub_menu">
                                <li><a href="index.html">Homepage V1</a></li>
                                <li><a href="home-02.html">Homepage V2</a></li>
                                <li><a href="home-03.html">Homepage V3</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="product.html">Shop</a>
                        </li>

                        <li class="sale-noti">
                            <a href="product.html">Sale</a>
                        </li>

                        <li>
                            <a href="cart.html">Features</a>
                        </li>

                        <li>
                            <a href="blog.html">Blog</a>
                        </li>

                        <li>
                            <a href="about.html">About</a>
                        </li>

                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                <a href="#" class="header-wrapicon1 dis-block">
                    <img src="{{ asset('fashe') }}/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>

                <span class="linedivide1"></span>

                <div class="header-wrapicon2">
                    <img src="{{ asset('fashe') }}/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">0</span>

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
                </div>
            </div>
        </div>  --}}


        <!-- top noti -->
        {{--  <div class="flex-c-m size22 bg0 s-text21 pos-relative">
            20% off everything!
            <a href="product.html" class="s-text22 hov6 p-l-5">
                Shop Now
            </a>

            <button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
                <i class="fa fa-remove fs-13" aria-hidden="true"></i>
            </button>
        </div>  --}}

        <!-- Header -->
        <header class="header2">
            <!-- Header desktop -->
            {{--  Подключение шапку сайта для Компютерных версии  --}}
            @include("fashe.includes.desktop_header")

            <!-- Header Mobile -->
            {{--  Подключение шапку сайта для Мобильных версии  --}}
            @include("fashe.includes.mobile_header")

            <!-- Menu Mobile -->
            {{--  Меню Мобильных версии сайта  --}}
            @include("fashe.includes.mobile_menu")
        </header>

            <section class="bgwhite p-t-45 p-b-58">
                <div class="container">
                    <div class="sec-title p-b-22">
                        <h3 class="m-text4 t-center">
                            {{ $title }}
                        </h3>
                    </div>

                    @include("includes.session")

                    <div id="main-wrapper">
                        <div class="row">
                            {{--  Аватар Пользователья  --}}
                            @include("fashe.includes.user_profile_left_sidebar")

                            {{--  // Тело сайта  --}}
                            @yield('content')


                            {{--  Правый сайтБар  --}}
                            @yield('right_sidebar')



                        </div><!-- Row -->
                    </div><!-- Main Wrapper -->

                    <div class="page-footer">
                        <p>Made with <i class="fa fa-heart"></i> by stacks</p>
                    </div>

                    <!-- Tab01 -->
                    <div class="tab01">
                    </div>
                </div>
            </section>

            <!-- Footer -->
            @include("fashe.includes.footer")


            <!-- Back to top -->
            <div class="btn-back-to-top bg0-hov" id="myBtn">
                <span class="symbol-btn-back-to-top">
                    <i class="fa fa-angle-double-up" aria-hidden="true"></i>
                </span>
            </div>

            <!-- Container Selection1 -->
            <div id="dropDownSelect1"></div>

            <!-- Modal Video 01-->
            <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

                <div class="modal-dialog" role="document" data-dismiss="modal">
                    <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

                    <div class="wrap-video-mo-01">
                        <div class="w-full wrap-pic-w op-0-0">
                            <img src="{{ asset('fashe') }}/images/icons/video-16-9.jpg" alt="IMG">
                        </div>
                        <div class="video-mo-01">
                            <iframe src="https://www.youtube.com/embed/Nt8ZrWY2Cmk?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <!--===============================================================================================-->
            <script type="text/javascript" src="{{ asset('fashe') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
            <!--===============================================================================================-->

            <script src="{{ asset('fashe') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
            {{-- <script src="{{ asset('fashe') }}/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script> --}}



            <script type="text/javascript" src="{{ asset('fashe') }}/vendor/animsition/js/animsition.min.js"></script>
            <!--===============================================================================================-->
            <script type="text/javascript" src="{{ asset('fashe') }}/vendor/bootstrap/js/popper.js"></script>
            {{-- <script type="text/javascript" src="{{ asset('fashe') }}/vendor/bootstrap/js/bootstrap.min.js"></script> --}}
            <!--===============================================================================================-->
            <script type="text/javascript" src="{{ asset('fashe') }}/vendor/select2/select2.min.js"></script>
            {{-- <script type="text/javascript" src="{{ asset('fashe') }}/vendor/myJs/myJs.js"></script> --}}
            <!--===============================================================================================-->
            <script type="text/javascript" src="{{ asset('fashe') }}/vendor/daterangepicker/moment.min.js"></script>
            <script type="text/javascript" src="{{ asset('fashe') }}/vendor/daterangepicker/daterangepicker.js"></script>

            <!--===============================================================================================-->
            <script type="text/javascript" src="{{ asset('fashe') }}/vendor/slick/slick.min.js"></script>
            <script type="text/javascript" src="{{ asset('fashe') }}/js/slick-custom.js"></script>
            <!--===============================================================================================-->
            {{-- <script type="text/javascript" src="{{ asset('fashe') }}/vendor/countdowntime/countdowntime.js"></script> --}}
            <!--===============================================================================================-->
            {{-- <script type="text/javascript" src="{{ asset('fashe') }}/vendor/lightbox2/js/lightbox.min.js"></script> --}}
            <!--===============================================================================================-->
            {{-- <script type="text/javascript" src="{{ asset('fashe') }}/vendor/noui/nouislider.min.js"></script> --}}
            <script type="text/javascript" src="{{ asset('fashe') }}/vendor/sweetalert/sweetalert.min.js"></script>
            {{-- <script type="text/javascript" src="{{ asset('fashe') }}/vendor/myJs/myJs.js"></script> --}}
            <script type="text/javascript" src="{{ asset('fashe') }}/vendor/noui/nouislider.min.js"></script>

            {{-- <script type="text/javascript" src="{{ asset('fashe') }}/vendor/myJs/range.js"></script> --}}

            {{-- // Скрипт для рабты с продуктами / Товарами --}}
            @if (Route::currentRouteName() == "category.product")
                <script type="text/javascript">
                    $(document).ready(function() {

                        var filterBar = document.getElementById('filter-bar');

                        noUiSlider.create(filterBar, {
                            start: [
                                {{ $selected_price["min_selected"] }},
                                {{ $selected_price["max_selected"] }}
                            ],
                            // start: [ 50, 75 ],
                            connect: true,
                            range: {
                                'min': {{ $price_products["min_price"] }},
                                'max': {{ $price_products["max_price"] }},
                            }
                        });

                        var skipValues = [
                            document.getElementById('value-lower'),
                            document.getElementById('value-upper')
                        ];

                        filterBar.noUiSlider.on('update', function( values, handle ) {
                            skipValues[handle].innerHTML = Math.round(values[handle]) ;
                        });

                        //********************************************************************************************************************//
                        var btn = $("#filter").click(function (btn) {
                            // btn.preventDefault();

                            var token = $("[name='csrf-token']").attr("content");       // Получаем token из header
                            var value_lower = $("#value-lower").html();
                            var value_upper = $("#value-upper").html();
                            // var product = $(".product").attr("data-price");


                            console.log("token: " + token);
                            console.log("value_lower: " + value_lower);
                            console.log("value_upper: " + value_upper);


                            //  **************************************************************************************************//
                            var formMin = $("#min_selected_form").val(value_lower);
                            var formMax = $("#max_selected_form").val(value_upper);
                            //  **************************************************************************************************//
                        });

                    });
                </script>
            @endif

            <!--===============================================================================================-->
                {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script> --}}
                {{-- <script src="{{ asset('fashe') }}/js/map-custom.js"></script> --}}
            <!--===============================================================================================-->

            <!--===============================================================================================-->
            <script src="{{ asset('fashe') }}/js/main.js"></script>

            {{-- Корзина --}}


            <script src="{{ asset('fashe') }}/js/huy.js"></script>
            {{--  @if (Route::currentRouteName() == "index" || Route::currentRouteName() == "category.product" || Route::currentRouteName() == "show.product" || Route::currentRouteName() == "search.product" || Route::currentRouteName() == "cart.order.checkout")  --}}
                <script src="{{ asset('fashe') }}/js/cart.js"></script>
            {{--  @endif  --}}

            {{-- <script type="text/javascript" src="{{ asset('fashe') }}/vendor/myJs/myJs.js"></script> --}}

        </body>
    </html>
