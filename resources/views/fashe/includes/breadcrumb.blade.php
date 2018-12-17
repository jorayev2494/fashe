<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
    <a href="{{ route('index') }}" class="s-text16">
        @lang("langue.home")
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>

    <a href="{{ route('category.product') }}" class="s-text16">
        @lang("langue." . $menu->prefix)
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>

    <a href="{{ route('category.product', $category->link) }}" class="s-text16">
        @lang("langue." . $category->link)
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>

    <span class="s-text17">
        {{ $product->name }}
    </span>
</div>
