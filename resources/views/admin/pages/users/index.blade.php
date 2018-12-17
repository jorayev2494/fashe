@extends('admin.layouts.admin_master')


@section('content')

    <div class="panel panel-white">
        <div class="panel-heading">
            <h4 class="panel-title">{{ trans("admin.create_user") }}</h4>
        </div>
        <div class="panel-body">
            <a type="button" href="{{ route('admin.users.create') }}" id="test" class="btn btn-success m-b-sm">{{ trans("admin.create_user") }}</a>

            <div class="table-responsive">

                <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                    <thead>
                        <tr>
                            <th>{{ trans("admin.avatar") }}</th>
                            <th>{{ trans("admin.name") }}</th>
                            <th>{{ trans("admin.lastname") }}</th>
                            <th>{{ trans("admin.email") }}</th>
                            <th>{{ trans("admin.role") }}</th>
                            <th>{{ trans("admin.site") }}</th>
                            <th>{{ trans("admin.location") }}</th>
                            {{-- <th>{{ trans("admin.profession") }}</th> --}}
                            {{--  <th>{{ trans("admin.created_at") }}</th>  --}}
                            {{--  <th>{{ trans("admin.updated_at") }}</th>  --}}
                            <th>{{ trans("admin.action") }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)

                            {{-- @if (auth()->user()->role->prefix == "moderator" )
                                @continue
                            @endif --}}

                            <tr class="line-user-{{ $user->id }}">
                                <td style="padding: 5px;">
                                    <img src="{{ $user->getAvatar() }}" alt="{{ $user->getAvatar() }}" width="40" height="40">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                {{-- {{ dd($user->role->title) }} --}}
                                <td>{{ trans("admin." . $user->role->title) }}</td>
                                <td>{{ $user->site }}</td>
                                <td>{{ $user->location }}</td>
                                {{-- <td>{{ $user->profession }}</td> --}}
                                {{--  <td>{{ $user->created_at }}</td>  --}}
                                {{--  <td>{{ $user->updated_at }}</td>  --}}
                                <td style="width: 138px;">
                                    <a class="btn btn-success btn-sm" style="margin-right: 4px; float: left;" href="{{ route('admin.users.show', $user->id) }}">
                                    {{-- <a class="btn btn-info btn-addon" href="{{ route('admin.users.show', $user->id) }}"> --}}
                                        {{-- <i class="fa fa-info-circle" aria-hidden="true"></i> --}}
                                        @lang("admin.info")
                                    </a>

                                    <a class="btn btn-danger btn-sm delete_user" data-id="{{ $user->id }}" href="javascript:null">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>{{ trans("admin.avatar") }}</th>
                            <th>{{ trans("admin.name") }}</th>
                            <th>{{ trans("admin.lastname") }}</th>
                            <th>{{ trans("admin.email") }}</th>
                            <th>{{ trans("admin.site") }}</th>
                            <th>{{ trans("admin.location") }}</th>
                            {{-- <th>{{ trans("admin.profession") }}</th> --}}
                            {{--  <th>{{ trans("admin.created_at") }}</th>  --}}
                            {{--  <th>{{ trans("admin.updated_at") }}</th>  --}}
                            <th>{{ trans("admin.action") }}</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>

@endsection
