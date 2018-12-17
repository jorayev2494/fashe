@extends('admin.layouts.admin_master')


@section('content')

    <div id="main-wrapper">
        <div class="row">

            {{--  Аватар Пользователья  --}}
            <div class="col-md-3">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">User Profile</h4>
                    </div>
                    <div class="panel-body user-profile-panel">
                        {{--  http://via.placeholder.com/100x100  --}}
                        <img src="{{ $user->getAvatar() }}" class="user-profile-image img-circle" alt="{{ $user->getAvatar() }}">
                        <h4 class="text-center m-t-lg">{{ $user->name }}</h4>
                        <p class="text-center">{{ $user->email }}</p>
                        <hr>
                        <ul class="list-unstyled text-center">
                            <li><p><i class="fa fa-map-marker m-r-xs"></i>{{ $user->location }}</p></li>
                            <li><p><i class="fa fa-paper-plane-o m-r-xs"></i><a href="#">{{ $user->email }}</a></p></li>
                            <li><p><i class="fa fa-link m-r-xs"></i><a href="#">{{ $user->site }}</a></p></li>
                        </ul>
                        <hr>

                        {!! Form::open(["url" => route('admin.users.destroy', ['id' => $user->id]), 'method' => "DELETE"]) !!}
                            <button onclick="prompt('Вы уверены?')" class="btn btn-danger btn-block">@lang("admin.delete_user")</button>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

            {{--  Полное информацтя Пользователья  --}}
            <div class="col-md-6">
                <div class="profile-timeline">
                    <ul class="list-unstyled">
                        <li class="timeline-item">

                            {{--  {!! Form::open(["url" => route('admin.users.show', ["id" => $user->id], "method" => "POST")]) !!}  --}}

                                <div class="panel panel-white">

                                        <div style="float: right; margin-bottom: 10px">
                                            {{--  <label style="display: inline-block; margin-right: 50px">  --}}
                                                {{--  <input type="checkbox" id="autoopen" style="vertical-align: baseline">&nbsp;auto-open next field</label>  --}}
                                            <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" id="enable" class="btn btn-default">@lang("admin.edit")</a>
                                            {{--  <a href="{{ route('admin.users.show', ['id' => $user->id]) }}" id="enable" class="btn btn-default">@lang("admin.update")</a>  --}}
                                        </div>

                                        <table id="user" class="table table-hover table-striped" style="clear: both">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 35%;">@lang("admin.name")</td>
                                                    <td style="width: 65%;">
                                                        {{ isset($user->name) ? $user->name : trans("admin.empty") }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang("admin.lastname")</td>
                                                    <td>
                                                        {{ isset($user->lastname) ? $user->lastname : trans("admin.empty") }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang("admin.email")</td>
                                                    <td>
                                                        {{ isset($user->email) ? $user->email : trans("admin.empty") }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang("admin.role")</td>
                                                    <td>
                                                        {{ isset($user->role->title) ? trans("admin." . $user->role->title) : trans("admin.empty") }}
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>@lang("admin.site")</td>
                                                    <td>
                                                        {{ isset($user->site) ? $user->site : trans("admin.empty") }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang("admin.password")</td>
                                                    <td>
                                                        <span>{{ trans("admin.secret") }}</span>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>@lang("admin.location")</td>
                                                    <td>
                                                        {{ isset($user->location) ? $user->location : trans("admin.empty") }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang("admin.profession")</td>
                                                    <td>
                                                        {{ isset($user->profession) ? $user->profession : trans("admin.empty") }}
                                                    </td>
                                                </tr>

                                                {{--  <tr>
                                                    <td>@lang("admin.user_created_at")</td>
                                                    <td>
                                                        <span class="notready">{{ $user->created_at->format("d. M. Y") }}</span>
                                                    </td>
                                                </tr>  --}}
                                            </tbody>
                                        </table>
                                        <br>
                                        <p style="float: right; margin-bottom: 10px">@lang("admin.user_created_at") {{ $user->created_at->format("d. M. Y") }}</p>
                                        <br>
                                        {{--  <div style="float: left; width: 50%">
                                            <h3>Console <small>(all ajax requests here are emulated)</small></h3>
                                            <div><textarea id="console" class="form-control" rows="8" style="width: 70%"></textarea></div>
                                        </div>  --}}
                                </div>

                            {{--  {!! Form::close() !!}  --}}

                        </li>


                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Suggestions</h4>
                    </div>
                    <div class="panel-body">
                        <div class="team">
                            <div class="team-member">
                            <div class="online on"></div>
                                <img src="http://via.placeholder.com/40x40" alt="">
                            </div>
                            <div class="team-member">
                            <div class="online on"></div>
                                <img src="http://via.placeholder.com/40x40" alt="">
                            </div>
                            <div class="team-member">
                            <div class="online off"></div>
                                <img src="http://via.placeholder.com/40x40" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Some Info</h4>
                    </div>
                    <div class="panel-body">
                        <p>Integer tincidunt varius nulla, vitae facilisis nibh ornare dignissim. Morbi in orci vitae magna vestibulum placerat at vel augue. Pellentesque rutrum ipsum eget odio</p>
                    </div>
                </div>
            </div>
        </div><!-- Row -->
    </div><!-- Main Wrapper -->
    <div class="page-footer">
        <p>Made with <i class="fa fa-heart"></i> by stacks</p>
    </div>


@endsection
