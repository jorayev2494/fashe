@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">

            <div class="col-md-8">
                <div class="profile-timeline">

                    <ul class="list-unstyled">

                        <li class="timeline-item">

                            <div class="panel panel-white">

                                <div style="float: right; margin-bottom: 10px">
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-default">@lang('admin.edit')</a>
                                </div>

                                <table id="user" class="table table-hover table-striped" style="clear: both">
                                    <tbody>
                                        <tr>
                                            <td style="width: 35%;">
                                                <label for="role_name">@lang("admin.title")</label>
                                            </td>
                                            <td style="width: 65%;">
                                                {{ $role->title ? trans("admin." . $role->title) : trans("admin.empty") }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="role_link">@lang("admin.link")</label>
                                            </td>
                                            <td>
                                                {{ $role->prefix ? $role->prefix : trans("admin.empty") }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="role_link">@lang("admin.active")</label>
                                            </td>
                                            <td>
                                                {{-- {{ dd($role) }} --}}
                                                @if ($role->active)
                                                    <p class="text-success">@lang("admin.active")</p>
                                                @else
                                                    <p class="text-danger">@lang("admin.not_active")</p>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <br>
                                    <div style="float: right; margin-bottom: 10px">
                                        {!! Form::open(["url" => route("admin.roles.destroy", [$role->id]), "method" => "DELETE"]) !!}
                                            {!! Form::submit(trans('admin.delete'), ["class" => "btn btn-danger", "id" => "enable"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                <br>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">@lang("admin.users")</h4>
                    </div>
                    <div class="panel-body">
                        <ol>

                            @forelse ($role->users as $user)
                                <li>
                                    <a href="{{ route('admin.users.show', ['id' => $user->id]) }}">{{ $user->email }}</a>
                                </li>
                            @empty
                                @lang("admin.empty")
                            @endforelse

                        </ol>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
