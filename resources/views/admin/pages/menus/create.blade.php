@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">

        {!! Form::open(["url" => route('admin.menus.store'), "method" => "POST"]) !!}

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
                                                <label for="menu_title">@lang("admin.title")</label>
                                            </td>
                                            <td style="width: 65%;">
                                                {!! Form::text("menu_title", old("menu_title"), ["class" => "form-control", "id" => "menu_title", "placeholder" => trans("admin.title")]) !!}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="menu_prefix">@lang("admin.prefix")</label>
                                            </td>
                                            <td>
                                                {!! Form::text("menu_prefix", old("menu_prefix"), ["class" => "form-control", "id" => "menu_prefix", "placeholder" => env("APP_URL") . "your_menu"]) !!}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>

        {!! Form::close() !!}

        </div>
    </div>
@endsection
