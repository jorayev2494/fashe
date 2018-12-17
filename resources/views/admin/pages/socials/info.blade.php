@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">

            <div class="col-md-12">
                <div class="profile-timeline">

                    <ul class="list-unstyled">

                        <li class="timeline-item">

                            <div class="panel panel-white">

                                <div style="float: right; margin-bottom: 10px">
                                    <a href="{{ route('admin.socials.edit', $social->id) }}" class="btn btn-default">@lang('admin.edit')</a>
                                </div>

                                <table id="user" class="table table-hover table-striped" style="clear: both">
                                    <tbody>
                                        <tr>
                                            <td style="width: 35%;">
                                                @lang("admin.title")
                                            </td>
                                            <td style="width: 65%;">
                                                {{ $social->title ? $social->title : trans("admin.empty") }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                @lang("admin.icon")
                                            </td>
                                            <td>
                                                {{ $social->icon ? $social->icon : trans("admin.empty") }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                @lang("admin.url")
                                            </td>
                                            <td>
                                                {{ $social->url ? $social->url : trans("admin.empty") }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                @lang("admin.active")
                                            </td>
                                            <td>
                                                {{-- {{ dd($social) }} --}}
                                                @if ($social->active)
                                                    <p class="text-success">@lang("admin.active")</p>
                                                @else
                                                    <p class="text-danger">@lang("admin.not_active")</p>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                {{-- <br>
                                    <div style="float: right; margin-bottom: 10px">
                                        {!! Form::open(["url" => route("admin.socials.destroy", [$social->id]), "method" => "DELETE"]) !!}
                                            {!! Form::submit(trans('admin.delete'), ["class" => "btn btn-danger", "id" => "enable"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                <br> --}}
                            </div>

                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
