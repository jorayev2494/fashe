@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">

        {!! Form::open(["url" => route('admin.sliders.store'), "method" => "POST", 'enctype' => 'multipart/form-data']) !!}

            {{--  Просморт картинку  --}}
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Lens Zoom</h4>
                </div>
                <div class="panel-body">
                    <img id="zoom_04" src="{{ $defaultImage }}" data-zoom-image="{{ $defaultImage }}" style="width: 100%;" alt="{{ $defaultImage }}"/>
                </div>
                <br>
                {{-- <p>fesfesf</p> --}}
                {!! Form::file("image", ["class" => "form-control"]) !!}
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="profile-timeline">

                        <ul class="list-unstyled">

                            <li class="timeline-item">
                                <div class="panel panel-white">

                                    <div style="float: right; margin-bottom: 10px">
                                        <label for="active">@lang("admin.active")</label>
                                        {!! Form::checkbox("active", old("active"), old("active") ? true : false, ["class" => "form-control", "id" => "active"]) !!}
                                        {!! Form::submit(trans('admin.create'), ["class" => "btn btn-default", "id" => "enable"]) !!}
                                    </div>

                                    <table id="user" class="table table-hover table-striped" style="clear: both">
                                        <tbody>
                                            <tr>
                                                <td style="width: 35%;">
                                                    <label for="slider_title">@lang("admin.title")</label>
                                                </td>
                                                <td style="width: 65%;">
                                                    {!! Form::text("slider_title", old("slider_title"), ["class" => "form-control", "id" => "slider_title", "placeholder" => trans("admin.title")]) !!}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="slide_info">@lang("admin.info")</label>
                                                </td>
                                                <td>
                                                    {!! Form::text("slide_info", old("slide_info"), ["class" => "form-control", "id" => "slide_info", "placeholder" => trans("admin.info")]) !!}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="slider_link">@lang("admin.link")</label>
                                                </td>
                                                <td>
                                                    {!! Form::text("slider_link", old("slider_link"), ["class" => "form-control", "id" => "slider_link", "placeholder" => env("APP_URL") . "your_link"]) !!}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>

        {!! Form::close() !!}

    </div>
@endsection
