@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">
            {{--  Полное информацтя Пол
                ьзователья  --}}
        {!! Form::open(["url" => route('admin.products.store'), "method" => "POST", 'enctype' => 'multipart/form-data']) !!}

            <div class="col-md-7">
                <div class="profile-timeline">

                    <ul class="list-unstyled">

                        <li class="timeline-item">


                                <div class="panel panel-white">

                                        <div style="float: right; margin-bottom: 10px">
                                            {!! Form::submit(trans('admin.create'), ["class" => "btn btn-default", "id" => "enable"]) !!}
                                        </div>

                                        <table id="user" class="table table-hover table-striped" style="clear: both">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 35%;">
                                                        <label for="product_name">@lang("admin.product_name")</label>
                                                    </td>
                                                    <td style="width: 65%;">
                                                        {!! Form::text("product_name", old("product_name"), ["class" => "form-control", "id" => "product_name", "placeholder" => trans("admin.product_name")]) !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label for="category">@lang("admin.product_category")</label>
                                                    </td>
                                                    <td>
                                                        <select name="product_category" class="form-control" id="product_category">
                                                            <option disabled selected>@lang("admin.select_category")</option>

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
                                                        {!! Form::text("product_size", old("product_size"), ["class" => "form-control", "id" => "product_size", "data-role" => "tagsinput", "placeholder" => trans("admin.product_size") . ", "]) !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="product_count">@lang("admin.product_count")</label>
                                                    </td>
                                                    <td>
                                                        {!! Form::number("product_count", old("product_count"), ["class" => "form-control", "id" => "product_count", "placeholder" => trans("admin.product_count")]) !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label for="product_color">@lang("admin.product_color")</label>
                                                    </td>
                                                    <td>
                                                        {!! Form::text("product_color", old("product_color"), ["class" => "form-control", "id" => "product_color", "data-role" => "tagsinput", "placeholder" => trans("admin.color") . ", "]) !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label for="product_status">@lang("admin.product_status")</label>
                                                    </td>
                                                    <td>
                                                        <select name="product_status" class="form-control" id="product_status">
                                                            <option disabled selected>@lang("admin.select_status")</option>

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
                                                        {!! Form::number("product_price", old("product_price"), ["class" => "form-control", "id" => "product_price", "placeholder" => trans("admin.product_price"), "min" => 0]) !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label for="product_discount" class="text-danger">@lang("admin.discount")</label>
                                                    </td>
                                                    <td>
                                                        {!! Form::text("product_discount", old("product_discount"), ["class" => "form-control ", "id" => "product_discount", "placeholder" => trans("admin.product_price"), "min" => 0]) !!}
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>
                                                        <label for="active">@lang("admin.active")</label>
                                                    </td>
                                                    <td>
                                                        {!! Form::checkbox("active", old("active"), true, ["class" => "form-control ", "id" => "active"]) !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="product_description">@lang("admin.description")</label>
                                                    </td>
                                                    <td>
                                                        {!! Form::textarea("product_description", old("product_description"), ["class" => "form-control", "id" => "product_description", "placeholder" => trans("admin.description")]) !!}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <br>
                                </div>

                        </li>
                    </ul>
                </div>
            </div>

        {!! Form::close() !!}

            <div class="col-md-5">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">{{ trans("admin.upload_photo") }}</h4>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(["url" => route("admin.products.store"), "method" => "POST", "class" => "dropzone", "enctype" => "multipart/form-data", "id" => "myImageDropzone", "files" => true]) !!}

                            {{ csrf_field() }}
                        {{--  {!! Form::file("photo", ["class" => "dropzone", "multiple"]) !!}  --}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
