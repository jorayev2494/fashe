@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">

            <div class="col-md-7">
                <div class="profile-timeline">

                    <ul class="list-unstyled">

                        <li class="timeline-item">

                                <div class="panel panel-white">

                                        {!! Form::open(["url" => route('admin.products.update', $product->id), "method" => "PUT", 'enctype' => 'multipart/form-data']) !!}

                                            <div style="float: right; margin-bottom: 10px">
                                                {!! Form::submit(trans('admin.update'), ["class" => "btn btn-default", "id" => "enable"]) !!}
                                            </div>

                                            <table id="user" class="table table-hover table-striped" style="clear: both">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 35%;">
                                                            <label for="product_name">@lang("admin.product_name")</label>
                                                        </td>
                                                        <td style="width: 65%;">

                                                                {!! Form::text("product_name", $product->name, ["class" => "form-control", "id" => "product_name", "placeholder" => trans("admin.product_name")]) !!}

                                                            {{-- <a href="#" id="username" data-type="text" data-pk="5" data-title="Enter username" data-placeholder="{{ trans('admin.name') }}" class="editable editable-click username" style="display: inline;">{{ $user->name ?? trans('admin.empty') }}</a> --}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="category">@lang("admin.product_category")</label>
                                                        </td>
                                                        <td>
                                                            {{-- {{ dd($product->categories) }} --}}
                                                            <select name="product_category" class="form-control" id="product_category">
                                                                <option disabled selected>@lang("admin.select_category")</option>
                                                                {{-- <option value="{{ $product->category->id }}" selected>{{ $product->category->name }}</option> --}}
                                                                 <option value="{{ $product->categories[0]->id }}" selected>{{ $product->categories[0]->name }}</option>

                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="product_size">@lang("admin.product_sizes")</label>
                                                        </td>
                                                        <td>
                                                            {!! Form::text("product_size", $sizesTag, ["class" => "form-control", "id" => "product_size", "data-role" => "tagsinput", "placeholder" => trans("admin.product_sizes")]) !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="product_count">@lang("admin.product_count")</label>
                                                        </td>
                                                        <td>
                                                            {!! Form::number("product_count", $product->count, ["class" => "form-control", "id" => "product_count", "min" => 1, "placeholder" => trans("admin.product_count")]) !!}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label for="product_color">@lang("admin.product_color")</label>
                                                        </td>
                                                        <td>
                                                            {!! Form::text("product_color", $colorsTag, ["class" => "form-control", "id" => "product_color", "data-role" => "tagsinput", "placeholder" => trans("admin.product_color")]) !!}
                                                            {{--  <a href="#" id="group" data-type="select" data-pk="1" data-value="5" data-source="/groups" data-title="Select group" class="editable editable-click">Admin</a>  --}}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label for="product_status">@lang("admin.product_status")</label>
                                                        </td>
                                                        <td>
                                                            <select name="product_status" class="form-control" id="product_status">
                                                                <option value="{{ $product->status->id }}" selected>{{ $product->status->name }}</option>

                                                                @foreach ($statuses as $status)
                                                                    <option value="{{ $status->id }}" >{{ $status->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="product_price">@lang("admin.product_price")</label>
                                                        </td>
                                                        <td>
                                                            {!! Form::number("product_price", $product->price, ["class" => "form-control", "id" => "product_price", "placeholder" => trans("admin.product_price"), "min" => 0]) !!}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label for="product_discount" class="text-danger">@lang("admin.discount")</label>
                                                        </td>
                                                        <td>
                                                            {!! Form::text("product_discount", $product->discount, ["class" => "form-control ", "id" => "product_discount", "placeholder" => trans("admin.product_price"), "min" => 0]) !!}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label for="active">@lang("admin.active")</label>
                                                        </td>
                                                        <td>
                                                            {!! Form::checkbox("active", old("active"), ($product->active) ? true : false, ["class" => "form-control ", "id" => "active"]) !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="product_description">@lang("admin.description")</label>
                                                        </td>
                                                        <td>
                                                            {!! Form::textarea("product_description", $product->description, ["class" => "form-control", "id" => "product_description", "placeholder" => trans("admin.description")]) !!}
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                        {!! Form::close() !!}


                                        <br>

                                        <div style="float: right; margin-bottom: 10px">
                                            {!! Form::open(["url" => route("admin.products.destroy", [$product->id]), "method" => "DELETE"]) !!}
                                                {!! Form::submit(trans('admin.delete'), ["class" => "btn btn-danger", "id" => "enable"]) !!}
                                            {!! Form::close() !!}
                                        </div>

                                        <br>
                                </div>

                            {{--  {!! Form::close() !!}  --}}

                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-md-5">

                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">{{ trans("admin.upload_photo") }}</h4>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(["url" => route("admin.products.update", $product->id), "method" => "PUT", "class" => "dropzone", "enctype" => "multipart/form-data", "id" => "myImageDropzone", "files" => true]) !!}
                            {{ csrf_field() }}
                            {{--  {!! Form::file("photo", ["class" => "dropzone", "multiple"]) !!}  --}}
                        {!! Form::close() !!}
                    </div>
                </div>

                @foreach ((array)$product->getPhotos() as $photo)
                    <div class="col-md-3">
                        <div class="panel-body">
                            <img id="zoom_04" src="{{ $photo }}" data-zoom-image="{{ $photo }}" style="width: 100%;" alt="{{ $photo }}"/>
                            {{--  <img id="zoom_04" src="http://via.placeholder.com/1200x900" data-zoom-image="http://via.placeholder.com/1200x900" style="width: 100%;" alt=""/>  --}}
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection
