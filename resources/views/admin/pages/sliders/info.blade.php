@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">

        {{--  Просморт картинку  --}}
        <div class="panel panel-white" id="js-alerts">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Mousewheel Zoom</h4>
            </div>
            <div class="panel-body">
                <img id="zoom_04" src="{{ $slider->getImage() }}" data-zoom-image="{{ $slider->getImage() }}" style="width: 100%;" alt="{{ $slider->getImage() }}"/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="profile-timeline">

                    <ul class="list-unstyled">

                        <li class="timeline-item">

                            <div class="panel panel-white">

                                <div style="float: right; margin-bottom: 10px">
                                    <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-default">@lang('admin.edit')</a>
                                </div>

                                {{--  {{ dd($category->products) }}  --}}

                                <table id="user" class="table table-hover table-striped" style="clear: both">
                                    <tbody>
                                        <tr>
                                            <td style="width: 35%;">
                                                @lang("admin.title")
                                            </td>
                                            <td style="width: 65%;">
                                                {{ $slider->title ? $slider->title : trans("admin.empty") }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                @lang("admin.info")
                                            </td>
                                            <td>
                                                {{ $slider->info ? $slider->info : trans("admin.empty") }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                @lang("admin.link")
                                            </td>
                                            <td>
                                                {{ $slider->link ? env("APP_URL") . $slider->link : trans("admin.empty") }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <br>
                                    <div style="float: right; margin-bottom: 10px">
                                        {!! Form::open(["url" => route("admin.sliders.destroy", [$slider->id]), "method" => "DELETE"]) !!}
                                            {!! Form::submit(trans('admin.delete'), ["class" => "btn btn-danger", "id" => "enable"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                <br>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>

            {{-- <div class="col-md-4">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">@lang("admin.products")</h4>
                    </div>
                    <div class="panel-body">
                        <ol>

                            @forelse ($category->products as $product)
                                <li>{{ $product->name }}</li>
                            @empty
                                @lang("admin.empty")
                            @endforelse

                        </ol>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
