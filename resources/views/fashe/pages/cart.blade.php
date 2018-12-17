
@extends("fashe.layouts.app_master")


@section('content')

    <!-- Title Page -->
    {{-- <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('fashe') }}/images/heading-pages-01.jpg);">
        <h2 class="l-text2 t-center">
            @lang("langue.cart")
        </h2>
    </section> --}}




    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        {{-- {{ dd($cart) }} --}}

        {!! Form::open(["url" => route("order.checkout.cart"), "method" => "POST"]) !!}

        <div class="container" style="overflow: hidden;">
                @include("includes.session")
                    <!-- Cart item -->
                    <div class="container-table-cart pos-relative">
                        <div class="wrap-table-shopping-cart bgwhite">
                            <table class="table-shopping-cart">
                                {{-- {{ dd(count($cart)) }} --}}
                                @if (count($cart))
                                    <thead>
                                        <tr class="table-head">
                                            <th class="column-1">@lang("langue.image")</th>
                                            <th class="column-2">@lang("langue.product")Product</th>
                                            <th class="column-3">@lang("langue.price")</th>
                                            <th class="column-4 p-l-70">@lang("langue.quality")</th>
                                            <th class="column-5">@lang("langue.total")</th>
                                            <th class="column-5">@lang("langue.action")</th>
                                        </tr>
                                    </thead>
                                @endif

                                <tbody>
                                    @forelse ($cart as $product)
                                        <tr class="table-row clear_cart_prod del-prod-{{ $product['product_info']->id }}">
                                            <td class="column-1">
                                                <div class="cart-img-product b-rad-4 o-f-hidden btn-delete" data-prod-id="{{ $product['product_info']->id }}">
                                                    <img src="{{ $product['product_info']->getImage() }}" alt="IMG-PRODUCT">
                                                </div>
                                            </td>

                                            <td class="column-2">
                                                {{ $product['product_info']->name }}
                                            </td>

                                            <td class="column-3">
                                                $ {{ $product['price'] }}
                                            </td>

                                            <td class="column-4">
                                                <div class="flex-w bo5 of-hidden w-size17">
                                                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                                    </button>

                                                    {{--  {!! Form::number("num-product1", $product['count'], ["calss" => "size8 m-text18 t-center num-product", "data-max" =>  $product['product_info']->count]) !!}  --}}

                                                    <input class="size8 m-text18 t-center num-product" type="number" id="count-{{ $product['product_info']->id }}" name="count" data-max="{{ $product['product_info']->count }}" value="{{ $product['count'] }}">

                                                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </td>

                                            <td class="column-5">
                                                $ <span class="thisCount-{{ $product['product_info']->id }}">{{ $product['summa'] }}</span>
                                            </td>

                                            <td class="column-5">
                                                <div class="size10 trans-0-4 m-t-10 m-b-10">
                                                    <!-- Button -->
                                                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 btn-add-cart" data-id="{{ $product['product_info']->id }}" data-price="{{ $price = ($product['product_info']->discount) ? $product['product_info']->discount : $product['product_info']->price }}">
                                                        @lang("langue.update")
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="table-row clear_cart_prod">
                                            {{-- <td> --}}
                                                <center style="border: 1px solid #bebebe;">
                                                    <br><br>
                                                    <h3>Корзина Пусто</h3>
                                                    <br>
                                                    <p>
                                                        <a href="{{ route('index') }}">Перейти на главную</a>
                                                    </p>
                                                    <br><br>
                                                </center>
                                            {{-- </td> --}}
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">

                        <div class="size10 trans-0-4 m-t-10 m-b-10">
                            <!-- Button -->
                            <a href="#" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 clear_cart" onclick="location.reload();">
                                @lang("langue.clear_cart")
                            </a>
                        </div>
                    </div>


                    @if (!auth()->user())
                        <!-- DAta User -->
                        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm" style="float: left;">
                            <h5 class="m-text20 p-b-24">
                                @lang("langue.your_data")
                            </h5>

                            <!--  -->
                            <div class="flex-w flex-sb bo10 p-t-15 p-b-20">

                                <span class="s-text18 w-size19 w-full-sm">
                                    @lang("admin.name")
                                </span>
                                <div class="size13 bo4 m-b-12">
                                    {!! Form::text("name", old("name"), ["class" => "sizefull s-text7 p-l-15 p-r-15", "placeholder" => trans("admin.name")]) !!}
                                </div>

                                <span class="s-text18 w-size19 w-full-sm">
                                    @lang("admin.lastname")
                                </span>
                                <div class="size13 bo4 m-b-12">
                                    {!! Form::text("lastname", old("lastname"), ["class" => "sizefull s-text7 p-l-15 p-r-15", "placeholder" => trans("admin.lastname")]) !!}
                                </div>

                                <span class="s-text18 w-size19 w-full-sm">
                                    @lang("admin.email")
                                </span>
                                <div class="size13 bo4 m-b-12">
                                    {!! Form::email("email", old("email"), ["class" => "sizefull s-text7 p-l-15 p-r-15", "placeholder" => trans("admin.email")]) !!}
                                </div>

                                <span class="s-text18 w-size19 w-full-sm">
                                    @lang("admin.phone")
                                </span>
                                <div class="size13 bo4 m-b-12">
                                    {!! Form::text("phone", old("phone"), ["class" => "sizefull s-text7 p-l-15 p-r-15", "placeholder" => trans("admin.phone")]) !!}
                                </div>

                                <span class="s-text18 w-size19 w-full-sm">
                                        @lang("admin.address")
                                </span>
                                <div class="size13 bo4 m-b-12">
                                    {!! Form::text("address", old("address"), ["class" => "sizefull s-text7 p-l-15 p-r-15", "placeholder" => trans("admin.address")]) !!}
                                </div>

                            </div>
                            <br>

                                {!! Form::textarea("shipping", old("shipping"), ["class" => "sizefull s-text7 p-l-15 p-r-15", "rows" => "5", "cols" => "25",  "placeholder" => trans("langue.shipping")]) !!}

                        </div>

                    @endif

                    <!-- Total -->
                    <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm" style="float: right;">
                        <h5 class="m-text20 p-b-24">
                            @lang("langue.cart_totals")
                        </h5>

                        <!--  -->
                        <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                            <span class="s-text18 w-size19 w-full-sm">
                                @lang("langue.shipping")
                            </span>

                            <div class="w-size20 w-full-sm">
                                <p class="s-text8 p-b-23">
                                    Нет доступных способов доставки. Пожалуйста, дважды проверьте свой адрес или свяжитесь с нами, если вам нужна помощь.
                                </p>
                            </div>
                        </div>

                        <!--  -->
                        <div class="flex-w flex-sb-m p-t-26 p-b-30">
                            <span class="m-text22 w-size19 w-full-sm">
                                {{--  Total:  --}}
                                @lang("langue.count")
                            </span>

                            <span class="m-text21 w-size20 w-full-sm header-cart-count">
                                {{ $count }}
                            </span>
                        </div>

                        <!--  -->
                        <div class="flex-w flex-sb-m p-t-26 p-b-30">
                            <span class="m-text22 w-size19 w-full-sm">
                                {{--  Total:  --}}
                                @lang("langue.sub_total")
                            </span>

                            <span class="m-text21 w-size20 w-full-sm">
                                $ <span class="header-cart-summa">{{ $summa }}</span>
                            </span>
                        </div>

                        <div class="size15 trans-0-4">
                            <!-- Button -->
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                @lang("langue.protected_to_checkout")
                            </button>
                        </div>
                    </div>

                </div>

            {!! Form::close() !!}



    </section>

@endsection
