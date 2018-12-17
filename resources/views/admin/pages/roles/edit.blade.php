@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">

            <div class="col-md-12">
                <div class="profile-timeline">

                    <ul class="list-unstyled">

                        <li class="timeline-item">

                                <div class="panel panel-white">

                                    {!! Form::open(["url" => route('admin.roles.update', $role->id), "method" => "PUT"]) !!}

                                        <div style="float: right; margin-bottom: 10px">
                                            <label for="active">@lang("admin.active")</label>
                                            {!! Form::checkbox("active", null, $role->active ? true : false, ["class" => "form-control", "id" => "active"]) !!}
                                            {!! Form::submit(trans('admin.update'), ["class" => "btn btn-default", "id" => "enable"]) !!}
                                        </div>

                                        <table id="user" class="table table-hover table-striped" style="clear: both">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 35%;">
                                                        <label for="role_title">@lang("admin.role_title")</label>
                                                    </td>
                                                    <td style="width: 65%;">
                                                        {!! Form::text("role_title", $role->title, ["class" => "form-control", "id" => "role_title", "placeholder" => trans("admin.role_title")]) !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label for="role_prefix">@lang("admin.prefix")</label>
                                                    </td>
                                                    <td>
                                                        {!! Form::text("role_prefix", $role->prefix, ["class" => "form-control", "id" => "role_prefix", "placeholder" => "user"]) !!}
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
