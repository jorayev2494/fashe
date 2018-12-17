<div class="row">

    @forelse ($products as $key => $product)
        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50 product_{{ $key }}" data-price="{{ $product->discount ? $product->discount : $product->price }}">
            <!-- Block2 -->
            <div class="block2">
                <div class=" wrap-pic-w of-hidden pos-relative block2-label{{ ($product->status) ? $product->status->prefix : '' }}">  {{-- block2-labelsale --}}
                    <a href="{{ route('show.product', $product->id) }}">
                        <img src="{{ $product->getImage() }}" alt="{{ $product->getImage() }}">
                    </a>
                    {{-- <div class="block2-overlay trans-0-4">
                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                        </a>

                        <div class="block2-btn-addcart w-size1 trans-0-4">
                            <!-- Button -->
                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                @lang("langue.add_to_cart")
                            </button>
                        </div>
                    </div> --}}
                </div>

                <div class="block2-txt p-t-20">

                    <button class="size1 bg4 hov1 s-text1 btn-add-cart" data-id="{{ $product->id }}" data-price="{{ $price = $product->discount ? $product->discount : $product->price }}" style="margin-bottom: 10px;">
                        @lang("langue.add_to_cart")
                    </button>

                    <a href="{{ route('show.product', $product->id) }}" class="block2-name dis-block s-text3 p-b-5">
                        {{ $product->name }}
                    </a>

                    {{-- <span class="block2-price m-text6 p-r-5">
                        $29.50
                    </span>--}}

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

                </div>
            </div>
        </div>

    @empty

        @if (count($products) == 0 || $searched["cont_searched"] == 0)
            <center>
                <h2>@lang("langue.no_searched") '{{ $searched["search"] }}' :(</h2>
                <br><br>
                @lang("langue.go_to")
                <br><br>
                <a href="{{ route('index') }}">
                    <h3>@lang("langue.home")</h3>
                </a>
            </center>
        @elseif (count($products) == 0)
            <center>
                <h2>@lang("langue.no_searched") . "{{ $searched['search'] }} " :(</h2>
                <br><br>
                @lang("langue.go_to")
                <br><br>
                <a href="{{ route('index') }}">
                    <h3>@lang("langue.home")</h3>
                </a>
            </center>
        @endif

    @endforelse

</div>
