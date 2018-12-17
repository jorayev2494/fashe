<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
    <div class="leftbar p-r-20 p-r-0-sm">
        <!--  -->
        <h4 class="m-text14 p-b-7">
            @lang("langue.categories")
        </h4>

        <ul class="p-b-54">
            <li class="p-t-4">
                <a href="{{ route('category.product') }}" class="s-text13 {{ (!$category) ? 'active1' : '' }}">
                    @lang("langue.all")
                </a>
            </li>

            @foreach ($categories as $sidebarCat)
                <li class="p-t-4">

                    @if ($sidebarCat->active == true and $sidebarCat->products->count() > 0)
                        @if ($category)
                            <a href="{{ route('category.product', ['link' => $sidebarCat->link]) }}" class="s-text13 select {{ $active1 = ($sidebarCat->link == $category->link) ? 'active1' : null }}">
                                @lang("langue." . $sidebarCat->link)
                            </a>
                        @else
                            <a href="{{ route('category.product', ['link' => $sidebarCat->link]) }}" class="s-text13 select">
                                @lang("langue." . $sidebarCat->link)
                            </a>
                        @endif
                    @endif

                </li>
            @endforeach

        </ul>

        <!--  Range Диапозон  -->

        @if (Route::currentRouteName() == "category.product" && $price_products["min_price"] != $price_products["max_price"])
            @include("fashe.includes.range", ["category" => $category])
        @endif


        {{-- Colors Цветы --}}
        {{--  @include("fashe.includes.colors")  --}}

        {{-- Search Поиск --}}
        @include("fashe.includes.sidebar_search")

    </div>
</div>
