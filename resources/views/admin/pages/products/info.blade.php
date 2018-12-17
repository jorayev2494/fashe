@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">

            <div class="col-md-7">
                <div class="profile-timeline">

                    <ul class="list-unstyled">

                        <li class="timeline-item">


                            <div class="panel panel-white">

                                    <div style="float: right; margin-bottom: 10px">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-default">@lang('admin.edit')</a>
                                    </div>

                                    <table id="user" class="table table-hover table-striped" style="clear: both">
                                        <tbody>
                                            <tr>
                                                <td style="width: 35%;">
                                                    <label for="product_name">@lang("admin.product_name")</label>
                                                </td>
                                                <td style="width: 65%;">
                                                    {{ $product->name ? $product->name : trans("admin.empty") }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="category">@lang("admin.product_category")</label>
                                                </td>
                                                <td>
                                                    {{-- {{ dd($product->categories[0]) }} --}}
                                                    {{--  {{ dd($product->categories) }}  --}}
                                                    {{ $product->categories->count() ? $product->categories[0]->name : trans("admin.empty") }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="product_size">@lang("admin.product_sizes")</label>
                                                </td>
                                                <td>
                                                    {{ $product->size ? str_limit($sizesTag, 50) : trans("admin.empty") }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="product_count">@lang("admin.product_count")</label>
                                                </td>
                                                <td>
                                                    {{ $product->count ? $product->count : trans("admin.empty") }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="product_color">@lang("admin.product_color")</label>
                                                </td>
                                                <td>
                                                    {{ $product->color ? str_limit($colorsTag, 50) : trans("admin.empty") }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="product_status">@lang("admin.product_status")</label>
                                                </td>
                                                <td>
                                                    {{ isset($product->status->prefix) ? $product->status->prefix : trans("admin.empty") }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="product_price">@lang("admin.product_price")</label>
                                                </td>
                                                <td>
                                                    {{ ($product->price) ? $product->price : trans("admin.empty") }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="product_price">@lang("admin.discount")</label>
                                                </td>
                                                <td>
                                                    <p class="text-danger">{{ ($product->discount) ? $product->discount : trans("admin.empty") }}</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="active">@lang("admin.active")</label>
                                                </td>
                                                <td>
                                                    @if ($product->active)
                                                        <p class="text-success">@lang("admin.active")</p>
                                                    @else
                                                        <p class="text-danger">@lang("admin.not_active")</p>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="product_description">@lang("admin.description")</label>
                                                </td>
                                                <td>
                                                    <p>
                                                        {{ $product->description }}
                                                    </p>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <br>
                                        <div style="float: right; margin-bottom: 10px">
                                            {!! Form::open(["url" => route("admin.products.destroy", [$product->id]), "method" => "DELETE"]) !!}
                                                {!! Form::submit(trans('admin.delete'), ["class" => "btn btn-danger", "id" => "enable"]) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    <br>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-5">
                @foreach ((array)$product->getPhotos() as $photo)
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Inner Zoom</h4>
                        </div>
                        <div class="panel-body">
                            <img id="zoom_02" src="{{ $photo }}" data-zoom-image="{{ $photo }}" style="width: 100%;" alt="{{ $photo }}"/>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
