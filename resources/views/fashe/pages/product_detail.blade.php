
@extends("fashe.layouts.app_master")


@section('content')

    <!-- breadcrumb -->
    @include("fashe.includes.breadcrumb", $menu)


    <!-- Product Detail -->
    <div class="container bgwhite p-t-35 p-b-80">
        <div class="flex-w flex-sb">
            <div class="w-size13 p-t-30 respon5">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="wrap-slick3-dots"></div>

                    <div class="slick3">

                        @foreach ($product->getPhotos() as $photo)
                            <div class="item-slick3" data-thumb="{{ $photo }}">
                                <div class="wrap-pic-w">
                                    <img src="{{ $photo }}" alt="{{ $photo }}">
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5">
                <h4 class="product-detail-name m-text16 p-b-13">
                    {{ $product->name }}
                </h4>

                @if ($product->discount)
                    <span class="block2-oldprice m-text7 p-r-5">
                        $ {{ $product->price }}
                    </span>

                    <span class="block2-newprice m-text8 p-r-5">
                        $ {{ $product->discount }}
                    </span>
                @else
                    <span class="block2-price m-text6 p-r-5">
                        $ {{ $product->price }}
                    </span>
                @endif

                {{--  <span class="m-text17">
                    $ {{ $product->price }}
                </span>  --}}

                {{-- <p class="s-text8 p-t-10">
                    Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
                </p> --}}

                <!--  -->
                <div class="p-t-33 p-b-60">
                    <div class="flex-m flex-w p-b-10">
                        <div class="s-text15 w-size15 t-center">
                            @lang("langue.size")
                        </div>

                        <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                            <select class="selection-2" name="size">
                                @foreach ($sizes as $size)
                                    <option value="{{ $size }}">{{ $size }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex-m flex-w">
                        <div class="s-text15 w-size15 t-center">
                            @lang("langue.color")
                        </div>

                        <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                            <select class="selection-2" name="color">
                                @foreach ($colors as $color)
                                    <option value="{{ $color }}">{{ $color }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex-r-m flex-w p-t-10">
                        <div class="w-size16 flex-m flex-w">
                            <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                {{--  {!! Form::number("count", 1, ["calss" => "size8 m-text18 t-center num-product", "id" => "count", "data-max" =>  $product->count]) !!}  --}}

                                {{--  <input class="size8 m-text18 t-center num-product" type="number" id="count-{{ $product['product_info']->id }}" name="count" data-max="{{ $product['product_info']->count }}" value="{{ $product['count'] }}">  --}}

                                <input class="size8 m-text18 t-center num-product" type="number" id="count-{{ $product->id }}" name="count" value="1" data-max="{{ $product->count }}">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                                <!-- Button -->
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 btn-add-cart" data-id="{{ $product->id }}" data-price="{{ $price = $product->discount ? $product->discount : $product->price }}">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="p-b-45">
                    <span class="s-text8 m-r-35">SKU: MUG-01</span>
                    <span class="s-text8">Categories: Mug, Design</span>
                </div> --}}

                <!--  -->
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        @lang("langue.description")
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>

                {{-- <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Additional information
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                        </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Reviews (0)
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>


    <!-- Relate Product -->

    @include("fashe.includes.relations_category")

@endsection

