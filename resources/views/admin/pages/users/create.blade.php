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
                        <img src="{{ $defaultAva }}" class="user-profile-image img-circle" alt="{{ $defaultAva }}">
                        <h4 class="text-center m-t-lg">{{ trans('admin.name') }}</h4>
                        <p class="text-center">{{ trans('admin.email') }}</p>
                        <hr>
                        <ul class="list-unstyled text-center">
                            <li><p><i class="fa fa-map-marker m-r-xs"></i>{{ trans('admin.location') }}</p></li>
                            <li><p><i class="fa fa-paper-plane-o m-r-xs"></i><a href="#">{{ trans('admin.email') }}</a></p></li>
                            <li><p><i class="fa fa-link m-r-xs"></i><a href="#">{{ trans('admin.site') }}</a></p></li>
                        </ul>
                        <hr>

                            <button type="submit" class="btn btn-danger btn-block disabled">@lang("admin.delete_user")</button>

                    </div>
                </div>
            </div>

            {{--  Полное информацтя Пользователья  --}}
            <div class="col-md-6">
                <div class="profile-timeline">
                    <ul class="list-unstyled">
                        <li class="timeline-item">

                            {!! Form::open(["url" => route('admin.users.store'), "method" => "POST", 'enctype' => 'multipart/form-data']) !!}

                                <div class="panel panel-white">

                                        <div style="float: right; margin-bottom: 10px">
                                            {{--  <label style="display: inline-block; margin-right: 50px">  --}}
                                                {{--  <input type="checkbox" id="autoopen" style="vertical-align: baseline">&nbsp;auto-open next field</label>  --}}
                                            {{--  <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" ></a>  --}}
                                            <input type="submit" id="enable" class="btn btn-default" value="{{ trans('admin.create') }}">
                                            {{--  <a href="{{ route('admin.users.show', ['id' => $user->id]) }}" id="enable" class="btn btn-default">@lang("admin.update")</a>  --}}
                                        </div>

                                        {{--  <p>Click to edit</p>  --}}
                                        <table id="user" class="table table-hover table-striped" style="clear: both">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 35%;">@lang("admin.name")</td>
                                                    <td style="width: 65%;">
                                                        {{--  <div class="form-group col-md-6">  --}}
                                                            {{--  <label for="exampleInputName">First Name</label>  --}}
                                                            <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="{{ trans('admin.name') }}" value="{{ isset($user->name) ? $user->name : old('name') }}">
                                                        {{--  </div>  --}}
                                                        {{--  <a href="#" id="username" data-type="text" data-pk="5" data-title="Enter username" data-placeholder="{{ trans('admin.name') }}" class="editable editable-click username" style="display: inline;">{{ $user->name ?? trans('admin.empty') }}</a>  --}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang("admin.lastname")</td>
                                                    <td>
                                                        {{--  <div class="form-group col-md-6">  --}}
                                                            {{--  <label for="exampleInputName">First Name</label>  --}}
                                                            <input type="text" class="form-control" name="lastname" id="exampleInputName" placeholder="{{ trans('admin.lastname') }}" value="{{ isset($user->lastname) ? $user->lastname : old('lastname') }}">
                                                        {{--  </div>  --}}
                                                        {{--  <a href="#" id="firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname" class="editable editable-click editable-empty">Empty</a>  --}}
                                                        {{--  <a href="#" id="lastname" data-type="text" data-pk="1" data-value="{{ $user->lastname ?? trans('admin.empty') }}" data-placement="bottom" data-placeholder="{{ trans('admin.lastname') }}" data-title="Enter your firstname" class="editable editable-click">{{ $user->lastname ?? trans('admin.empty') }}</a>  --}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang("admin.email")</td>
                                                    <td>
                                                        {{--  <div class="form-group col-md-6">  --}}
                                                            {{--  <label for="exampleInputName">First Name</label>  --}}
                                                            <input type="text" class="form-control" name="email" id="exampleInputName" placeholder="{{ trans('admin.email') }}" value="{{ isset($user->email) ? $user->email : old('email') }}">
                                                        {{--  </div>  --}}
                                                        {{--  <a href="#" id="sex" data-type="select" data-pk="1" data-value="" data-title="Select sex" class="editable editable-click" style="color: gray;">not selected</a>  --}}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label for="role">@lang("admin.role")</label>
                                                    </td>
                                                    <td>
                                                        <select name="role" class="form-control" id="role">
                                                            <option disabled selected>@lang("admin.select_role")</option>

                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}" >{{ trans("admin." . $role->title) }}</option>
                                                            @endforeach

                                                        </select>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>@lang("admin.site")</td>
                                                    <td>
                                                        {{--  <div class="form-group col-md-6">  --}}
                                                            {{--  <label for="exampleInputName">First Name</label>  --}}
                                                            <input type="text" class="form-control" name="site" id="exampleInputName" placeholder="{{ trans('admin.url') }}" value="{{ isset($user->site) ? $user->site : old('site') }}">
                                                        {{--  </div>  --}}
                                                        {{--  <a href="#" id="group" data-type="select" data-pk="1" data-value="5" data-source="/groups" data-title="Select group" class="editable editable-click">Admin</a>  --}}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>@lang("admin.avatar")</td>
                                                    <td>
                                                        {{--  <div class="form-group col-md-6">  --}}
                                                            {{--  <label for="exampleInputName">First Name</label>  --}}
                                                            <input type="file" name="avatar" class="form-control" id="avatar">
                                                        {{--  </div>  --}}
                                                        {{--  <a href="#" id="group" data-type="select" data-pk="1" data-value="5" data-source="/groups" data-title="Select group" class="editable editable-click">Admin</a>  --}}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>@lang("admin.password")</td>
                                                    <td>
                                                        {{--  <div class="form-group col-md-6">  --}}
                                                            {{--  <label for="exampleInputName">First Name</label>  --}}
                                                            <input type="password" class="form-control" name="password" id="exampleInputName" placeholder="{{ trans('admin.password') }}">
                                                        {{--  </div>  --}}
                                                        {{--  <a href="#" id="status" data-type="select" data-pk="1" data-value="0" data-source="/status" data-title="Select status" class="editable editable-click">Active</a>  --}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang("admin.password_confirmation")</td>
                                                    <td>
                                                        {{--  <div class="form-group col-md-6">  --}}
                                                            {{--  <label for="exampleInputName">First Name</label>  --}}
                                                            <input type="password" class="form-control" name="password_confirmation" id="exampleInputName" placeholder="{{ trans('admin.password_confirmation') }}">
                                                        {{--  </div>  --}}
                                                        {{--  <a href="#" id="status" data-type="select" data-pk="1" data-value="0" data-source="/status" data-title="Select status" class="editable editable-click">Active</a>  --}}
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>@lang("admin.location")</td>
                                                    <td>
                                                        {{--  <div class="form-group col-md-6">  --}}
                                                            {{--  <label for="exampleInputName">First Name</label>  --}}
                                                            <input type="text" class="form-control" name="location" id="exampleInputName" placeholder="{{ trans('admin.location') }}" value="{{ isset($user->location) ? $user->location : old('location') }}">
                                                        {{--  </div>  --}}
                                                        {{--  <a href="#" id="dob" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth" class="editable editable-click">15/05/1984</a>  --}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang("admin.profession")</td>
                                                    <td>
                                                        {{--  <div class="form-group col-md-6">  --}}
                                                            {{--  <label for="exampleInputName">First Name</label>  --}}
                                                            <input type="text" class="form-control" name="profession" id="exampleInputName" placeholder="{{ trans('admin.profession') }}" value="{{ isset($user->profession) ? $user->profession : old('profession') }}">
                                                        {{--  </div>  --}}
                                                        {{--  <a href="#" id="event" data-type="combodate" data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-pk="1" data-title="Setup event date and time" class="editable editable-click editable-empty">Empty</a>  --}}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <br>
                                            {{--  <p style="float: right; margin-bottom: 10px">@lang("admin.user_created_at") {{ $user->created_at->format("d. M. Y") }}</p>  --}}
                                        {{--  <br>  --}}
                                        {{--  <div style="float: left; width: 50%">
                                            <h3>Console <small>(all ajax requests here are emulated)</small></h3>
                                            <div><textarea id="console" class="form-control" rows="8" style="width: 70%"></textarea></div>
                                        </div>  --}}
                                </div>

                            {!! Form::close() !!}

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
