<div class="wrap_menu">
    <nav class="menu">
        <ul class="main_menu">

            <li>
                <a href="{{ route('index') }}">@lang("langue.home")</a>
            </li>

            @foreach ($menus as $menu)
                @if (count($menu->categories) > 0)
                    <li>
                        {{--  {{ dd($categories) }}  --}}
                        <a href="{{ route('category.product') }}">{{ trans("langue." . $menu->name) }}</a>
                        <ul class="sub_menu">

                            @foreach ($menu->categories as $category)

                                @if ($category->active == true and $category->products->count() > 0)
                                    <li>
                                        <a href="{{ route('category.product', ['product' => $category->link]) }}">@lang("langue." . $category->link)</a>
                                    </li>
                                @endif

                            @endforeach

                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ url($menu->prefix) }}">{{ trans("langue." . $menu->name) }}</a>
                    </li>
                @endif
            @endforeach

        </ul>
    </nav>
</div>
