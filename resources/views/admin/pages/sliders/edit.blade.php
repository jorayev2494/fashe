@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">

        {!! Form::open(["url" => route('admin.sliders.update', $slider->id), "method" => "PUT", 'enctype' => 'multipart/form-data']) !!}

            {{--  Просморт картинку  --}}
            <div class="panel panel-white" id="js-alerts">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Mousewheel Zoom</h4>
                </div>
                <div class="panel-body">
                    <img id="zoom_04" src="{{ $slider->getImage() }}" data-zoom-image="{{ $slider->getImage() }}" style="width: 100%;" alt="{{ $slider->getImage() }}"/>
                </div>

                <br>
                <p></p>
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
                                                {!! Form::checkbox("active", null, $slider->active ? true : false, ["class" => "form-control", "id" => "active"]) !!}
                                                {!! Form::submit(trans('admin.update'), ["class" => "btn btn-default", "id" => "enable"]) !!}
                                            </div>

                                            <table id="user" class="table table-hover table-striped" style="clear: both">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 35%;">
                                                            <label for="slider_title">@lang("admin.title")</label>
                                                        </td>
                                                        <td style="width: 65%;">
                                                            {!! Form::text("slider_title", $slider->title, ["class" => "form-control", "id" => "slider_title", "placeholder" => trans("admin.title")]) !!}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label for="slider_info">@lang("admin.info")</label>
                                                        </td>
                                                        <td>
                                                            {!! Form::text("slider_info", $slider->info, ["class" => "form-control", "id" => "slider_info", "placeholder" => trans("admin.info")]) !!}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <label for="slider_link">@lang("admin.link")</label>
                                                        </td>
                                                        <td>
                                                            {!! Form::text("slider_link", $slider->link, ["class" => "form-control", "id" => "slider_link", "placeholder" => env("APP_URL") . "your_link"]) !!}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                        <br>
                                    </div>

                                {{--  {!! Form::close() !!}  --}}

                            </li>
                        </ul>
                    </div>
                </div>

            </div>

        {!! Form::close() !!}

    </div>
@endsection
