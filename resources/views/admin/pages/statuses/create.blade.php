@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">

        {!! Form::open(["url" => route('admin.statuses.store'), "method" => "POST"]) !!}

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
                                                <label for="category_title">@lang("admin.category_title")</label>
                                            </td>
                                            <td style="width: 65%;">
                                                {!! Form::text("status_title", old("status_title"), ["class" => "form-control", "id" => "category_title", "placeholder" => trans("admin.category_title")]) !!}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="status_prefix">@lang("admin.prefix")</label>
                                            </td>
                                            <td>
                                                {!! Form::text("status_prefix", old("status_prefix"), ["class" => "form-control", "id" => "status_prefix", "placeholder" => trans("admin.prefix")]) !!}
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
