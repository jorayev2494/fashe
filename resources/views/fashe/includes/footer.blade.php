
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">
        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                @lang("langue.get_in_touch")
                {{--  GET IN TOUCH  --}}
            </h4>

            <div>
                <p class="s-text7 w-size27">
                    Любые вопросы? Сообщите нам в магазине на обл. Полтаве ул.Институский Проезд 24,
                    {{-- 6-м этаже, блок 607  --}}
                    или позвоните нам (+380) 95 667 96 96
                </p>

                <div class="flex-m p-t-30">
                    {{--  Соцыйальный сети  --}}
                    @include("fashe.includes.socials")
                </div>
            </div>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                @lang("admin.categories")
            </h4>

            <ul>

                @foreach ($menus as $menu)

                    @foreach ($menu->categories as $category)

                        @if ($category->active == true and $category->products->count() > 0)
                            <li  class="p-b-9">
                                <a class="s-text7" href="{{ route('category.product', ['product' => $category->link]) }}">@lang("langue." . $category->link)</a>
                            </li>
                        @endif

                    @endforeach

                @endforeach

            </ul>
        </div>


        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                @lang("admin.link")
            </h4>

            <ul>

                @foreach($menus as $menu)

                    {{--  @if ($menu->categories)
                        @continue
                    @endif  --}}

                    <li  class="p-b-9">
                        <a href="{{ url($menu->prefix) }}">{{ trans("langue." . $menu->name) }}</a>
                    </li>

                @endforeach


                {{--  <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Search
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        About Us
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Contact Us
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Returns
                    </a>
                </li>  --}}
            </ul>
        </div>

        {{--  <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Помогать
                Helps
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Track Order
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Returns
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Shipping
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        FAQs
                    </a>
                </li>
            </ul>
        </div>  --}}

        <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                @lang("langue.newsletter")
            </h4>

            {!! Form::open(["url" => route('subscribe')]) !!}

                <div class="effect1 w-size9">

                    {!! Form::text("email", old("email"), ["class" => "s-text7 bg6 w-full p-b-5", "placeholder" => "emai@email.com"]) !!}

                    {{--  <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">  --}}
                    <span class="effect1-line"></span>
                </div>

                <div class="w-size2 p-t-20">
                    <!-- Button -->
                    {!! Form::submit(trans("langue.subscribe"), ["class" => "flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4"]) !!}
                </div>

            {!! Form::close() !!}

        </div>
    </div>

    <div class="t-center p-l-15 p-r-15">
        <a href="#">
            <img class="h-size2" src="{{ asset('fashe') }}/images/icons/paypal.png" alt="IMG-PAYPAL">
        </a>

        <a href="#">
            <img class="h-size2" src="{{ asset('fashe') }}/images/icons/visa.png" alt="IMG-VISA">
        </a>

        <a href="#">
            <img class="h-size2" src="{{ asset('fashe') }}/images/icons/mastercard.png" alt="IMG-MASTERCARD">
        </a>

        <a href="#">
            <img class="h-size2" src="{{ asset('fashe') }}/images/icons/express.png" alt="IMG-EXPRESS">
        </a>

        <a href="#">
            <img class="h-size2" src="{{ asset('fashe') }}/images/icons/discover.png" alt="IMG-DISCOVER">
        </a>

        <div class="t-center s-text8 p-t-20">
            Copyright © 2018 Все права защищены.
            {{--  Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>  --}}
        </div>
    </div>
</footer>
