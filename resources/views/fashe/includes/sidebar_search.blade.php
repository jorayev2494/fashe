<h4 class="m-text14 p-b-7">
    @lang("langue.search")
</h4>

<div class="search-product pos-relative bo4 of-hidden">
    {!! Form::open(["url" => route("search.product"), "method" => "GET"]) !!}
        {{--  <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">  --}}
        {!! Form::text("search-product", $searched['search'] ?? old("search-product"), ["class" => "s-text7 size6 p-l-23 p-r-50", "placeholder" => trans("langue.search_products")]) !!}

        <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
        </button>

    {!! Form::close() !!}
</div>
{{--  <br>  --}}

@if (isset($searched["cont_searched"]))
    <p>@lang("langue.count_searched") {{ $searched["cont_searched"] }}</p>
@endif

