<section class="relateproduct bgwhite p-t-45 p-b-138">
    <div class="container">
        <div class="sec-title p-b-60">
            <h3 class="m-text5 t-center">
                @lang("langue.related_products")
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">

                {{--  {{ dd($category_products) }}  --}}


                @foreach ($category_products as $relProduct)

                    @if ($relProduct->id == $product->id || $relProduct->action)
                        @continue
                    @endif

                    <div class="item-slick2 p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">

                            <div class=" wrap-pic-w of-hidden pos-relative block2-label{{ ($relProduct->status) ? $relProduct->status->prefix : '' }}">  {{-- block2-labelsale --}}
                                <a href="{{ route('show.product', $relProduct->id) }}">
                                    <img src="{{ $relProduct->getImage() }}" alt="{{ $relProduct->getImage() }}">
                                </a>
                            </div>

                            <div class="block2-txt p-t-20">

                                <button class="size1 bg4 hov1 s-text1" style="margin-bottom: 10px;">
                                    @lang("langue.add_to_cart")
                                </button>

                                <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                    {{ $relProduct->name }}
                                </a>

                                @if ($relProduct->discount)
                                    <span class="block2-oldprice m-text7 p-r-5">
                                        $ {{ $relProduct->price }}
                                    </span>

                                    <span class="block2-newprice m-text8 p-r-5">
                                        $ {{ $relProduct->discount }}
                                    </span>
                                @else
                                    <span class="block2-price m-text6 p-r-5">
                                        $ {{ $relProduct->price }}
                                    </span>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</section>
