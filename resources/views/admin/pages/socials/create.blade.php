@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">

        {!! Form::open(["url" => route('admin.socials.store'), "method" => "POST"]) !!}

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
                                                <label for="social_title">@lang("admin.title")</label>
                                            </td>
                                            <td style="width: 65%;">
                                                {!! Form::text("social_title", old("social_title"), ["class" => "form-control", "id" => "social_title", "placeholder" => trans("admin.title")]) !!}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="social_icon">@lang("admin.icon")</label>
                                            </td>
                                            <td>
                                                {!! Form::text("social_icon", old("social_icon"), ["class" => "form-control", "id" => "social_icon", "placeholder" => trans("admin.icon")]) !!}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 35%;">
                                                <label for="social_url">@lang("admin.url")</label>
                                            </td>
                                            <td style="width: 65%;">
                                                {!! Form::text("social_url", old("social_url"), ["class" => "form-control", "id" => "social_url", "placeholder" => trans("admin.url")]) !!}
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
