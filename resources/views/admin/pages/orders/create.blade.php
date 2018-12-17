@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">

        {!! Form::open(["url" => route('admin.roles.store'), "method" => "POST"]) !!}

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
                                                <label for="role_title">@lang("admin.role_title")</label>
                                            </td>
                                            <td style="width: 65%;">
                                                {!! Form::text("role_title", old("role_title"), ["class" => "form-control", "id" => "role_title", "placeholder" => trans("admin.role_title")]) !!}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="role_prefix">@lang("admin.prefix")</label>
                                            </td>
                                            <td>
                                                {!! Form::text("role_prefix", old("role_prefix"), ["class" => "form-control", "id" => "role_prefix", "placeholder" => "user"]) !!}
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
