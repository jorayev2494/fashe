@extends("fashe.layouts.app_profile")

@section('content')

    {{--  Полное информацтя Пользователья  --}}
    <div class="col-md-5 border" style=" /* border-radius: 5px; */ margin: 0 50px;">
        <div class="profile-timeline">
            <ul class="list-unstyled">
                <li class="timeline-item">

                    {{--  {!! Form::open(["url" => route('profile.edit', ["id" => auth()->user()->id]), "method" => "POST"]) !!}  --}}

                        <div class="panel panel-white">
                            <div style="float: right; margin-bottom: 10px">
                                {{--  <label style="display: inline-block; margin-right: 50px">
                                    <input type="checkbox" id="autoopen" style="vertical-align: baseline">&nbsp;auto-open next field
                                </label>  --}}


                                <div class="block2-txt p-t-20">
                                    <a href="{{ route('profile.edit') }}" class="size1 bg4 hov1 s-text1" style="vertical-align: baseline; padding: 6px 14px;">@lang("admin.edit")</a>
                                    {{--  <a href="{{ route('admin.users.edit', ['id' => auth()->user()->id]) }}" class="size1 bg4 hov1 s-text1" style="vertical-align: baseline; padding: 6px 14px;">@lang("admin.edit")</a>  --}}
                                </div>
                                <br>
                            </div>

                            <table id="user" class="table table-striped" style="clear: both">
                                <tbody>
                                    <tr>
                                        <td style="width: 35%;">@lang("admin.name")</td>
                                        <td style="width: 65%;">
                                            {{ isset(auth()->user()->name) ? auth()->user()->name : trans("admin.empty") }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>@lang("admin.lastname")</td>
                                        <td>
                                            {{ isset(auth()->user()->lastname) ? auth()->user()->lastname : trans("admin.empty") }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>@lang("admin.email")</td>
                                        <td>
                                            {{ isset(auth()->user()->email) ? auth()->user()->email : trans("admin.empty") }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>@lang("admin.site")</td>
                                        <td>
                                            {{ isset(auth()->user()->site) ? auth()->user()->site : trans("admin.empty") }}
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
                                            {{ isset(auth()->user()->location) ? auth()->user()->location : trans("admin.empty") }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>@lang("admin.profession")</td>
                                        <td>
                                            {{ isset(auth()->user()->profession) ? auth()->user()->profession : trans("admin.empty") }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <p style="float: right; margin-bottom: 10px">@lang("langue.your_created_at") {{ auth()->user()->created_at->format("d. M. Y") }}</p>
                            <br>

                        </div>

                    {!! Form::close() !!}

                </li>
            </ul>
        </div>
    </div>

@endsection



@section('right_sidebar')
    <div class="col-md-3 border" style=" /* border-radius: 5px; */ ">
    </div>
@stop

