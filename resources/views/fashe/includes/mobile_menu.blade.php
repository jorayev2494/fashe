<div class="wrap-side-menu" >
    <nav class="side-menu">
        <ul class="main-menu">
            {{--  <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <span class="topbar-child1">
                    Free shipping for standard order over $100
                </span>
            </li>  --}}

            {{--  <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <div class="topbar-child2-mobile">
                    <span class="topbar-email">
                        fashe@example.comq
                    </span>

                    <div class="topbar-language rs1-select2">
                        <select class="selection-1" name="time">
                            <option>USD</option>
                            <option>EUR</option>
                        </select>
                    </div>
                </div>
            </li>  --}}

            <li class="item-topbar-mobile p-l-10">
                <div class="topbar-social-mobile">
                    {{--  Подключение социальный сетей сайта  --}}
                    @include("fashe.includes.socials")

                </div>
            </li>

            <li class="item-menu-mobile">
                <a href="{{ route('index') }}">@lang("langue.home")</a>
                {{--  <a href="index.html">Home</a>
                <ul class="sub-menu">
                    <li><a href="index.html">Homepage V1</a></li>
                    <li><a href="home-02.html">Homepage V2</a></li>
                    <li><a href="home-03.html">Homepage V3</a></li>
                </ul>
                <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>  --}}
            </li>


            @foreach ($menus as $menu)

                @if (count($menu->categories) > 0)
                    <li class="item-menu-mobile">
                        <a href="{{ route('category.product') }}" style="display: block;">{{ trans("langue." . $menu->name) }}</a>
                        <ul class="sub-menu">

                            @foreach ($menu->categories as $category)

                                @if ($category->active == true and $category->products->count() > 0)
                                    <li>
                                        <a href="{{ route('category.product', ['product' => $category->link]) }}" style="display: block;">@lang("langue." . $category->link)</a>
                                    </li>
                                @endif

                            @endforeach

                        </ul>
                        <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                    </li>
                @else
                    <li class="item-menu-mobile">
                        <a href="{{ url($menu->prefix) }}" style="display: block;" >{{ trans("langue." . $menu->name) }}</a>
                    </li>
                @endif

            @endforeach


            <li class="item-menu-mobile">
                <a href="product.html">Shop</a>
            </li>

        </ul>
    </nav>
</div>
