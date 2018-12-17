@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">

            <div class="col-md-12">
                <div class="profile-timeline">

                    <ul class="list-unstyled">

                        <li class="timeline-item">

                                <div class="panel panel-white">

                                    {!! Form::open(["url" => route('admin.socials.update', $social->id), "method" => "PUT"]) !!}

                                        <div style="float: right; margin-bottom: 10px">
                                            <label for="active">@lang("admin.active")</label>
                                            {!! Form::checkbox("active", null, $social->active ? true : false, ["class" => "form-control", "id" => "active"]) !!}
                                            {!! Form::submit(trans('admin.update'), ["class" => "btn btn-default", "id" => "enable"]) !!}
                                        </div>

                                        <table id="user" class="table table-hover table-striped" style="clear: both">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 35%;">
                                                        <label for="social_title">@lang("admin.title")</label>
                                                    </td>
                                                    <td style="width: 65%;">
                                                        {!! Form::text("social_title", $social->title, ["class" => "form-control", "id" => "social_title", "placeholder" => trans("admin.title")]) !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label for="social_icon">@lang("admin.icon")</label>
                                                    </td>
                                                    <td>
                                                        {!! Form::text("social_icon", $social->icon, ["class" => "form-control", "id" => "social_icon", "placeholder" => trans("admin.icon")]) !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label for="social_url">@lang("admin.url")</label>
                                                    </td>
                                                    <td>
                                                        {!! Form::text("social_url", $social->url, ["class" => "form-control", "id" => "social_url", "placeholder" => trans("admin.url")]) !!}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    {!! Form::close() !!}

                                    <br>
                                </div>

                            {{--  {!! Form::close() !!}  --}}

                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
