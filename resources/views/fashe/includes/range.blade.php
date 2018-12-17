<h4 class="m-text14 p-b-32">
    @lang("langue.filters")
</h4>

<div class="filter-price p-t-22 p-b-50 bo3">
    <div class="m-text15 p-b-17">
        @lang("langue.price")
    </div>

    <div class="wra-filter-bar">
        <div id="filter-bar"></div>
    </div>

    <div class="flex-sb-m flex-w p-t-16">

        {!! Form::open(["url" => (!$category) ? route("category.product") : route("category.product", ["link" => $category->link]), "method" => "GET"]) !!}

            {!! Form::hidden("min_selected", null, ["id" => "min_selected_form"]) !!}
            {!! Form::hidden("max_selected", null, ["id" => "max_selected_form"]) !!}

            <div class="w-size11">
                <!-- Button -->
                <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4" id="filter">
                    @lang("langue.filter")
                </button>
            </div>

            <div class="s-text3 p-t-10 p-b-10">
                @lang("langue.range"): $<span id="value-lower"></span> - $<span id="value-upper"></span>
                {{-- @lang("langue.range"): $<span id="value-lower">50</span> - $<span id="value-upper">200</span> --}}
            </div>

        {!! Form::close() !!}

    </div>
</div>
