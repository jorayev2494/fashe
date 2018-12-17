@extends("fashe.layouts.app_master")

@section('content')
    <section class="bgwhite p-t-45 p-b-58">
        <div class="container">
            <div class="sec-title p-b-22">
                <h3 class="m-text4 t-center">
                    {{ $title }}
                    {{--  @lang("langue.our_products")  --}}
                </h3>
            </div>

            @include("includes.session")

            <div id="main-wrapper">
                <div class="row">
                    {{--  Аватар Пользователья  --}}
                    @include("fashe.includes.user_profile_left_sidebar")

                    {{--  Полное информацтя Пользователья  --}}
                    <div class="col-md-5 border" style=" /* border-radius: 5px; */ margin: 0 50px;">
                        <div class="profile-timeline">
                            <ul class="list-unstyled">
                                <li class="timeline-item">

                                    {!! Form::open(["url" => route('profile.upload'), "method" => "POST", 'enctype' => 'multipart/form-data']) !!}

                                        <div class="panel panel-white">
                                            <br>
                                            <td style="width: 35%;">@lang("langue.avatar")</td>
                                            {!! Form::file("avatar") !!}
                                            <br><br>
                                            <table id="user" class="table" style="clear: both; background: #f6f7f9;">
                                                <tbody>


                                                    <tr>
                                                        <td style="width: 35%;">@lang("admin.name")</td>
                                                        <td style="width: 65%;">
                                                            {!! Form::text("name", auth()->user()->name, ["class" => "form-control"]) !!}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>@lang("admin.lastname")</td>
                                                        <td>
                                                            {!! Form::text("lastname", auth()->user()->lastname, ["class" => "form-control"]) !!}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>@lang("admin.email")</td>
                                                        <td>
                                                            {!! Form::email("email", auth()->user()->email, ["class" => "form-control", "disabled"]) !!}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>@lang("admin.site")</td>
                                                        <td>
                                                            {!! Form::text("site", auth()->user()->site, ["class" => "form-control"]) !!}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>@lang("admin.password")</td>
                                                        <td>
                                                            {!! Form::password("password", ["class" => "form-control"]) !!}
                                                        </td>
                                                    </tr>

                                                    {{--  <tr>
                                                        <td>@lang("admin.password_confirmation")</td>
                                                        <td>
                                                            {!! Form::password("password_confirmation", ["class" => "form-control"]) !!}
                                                        </td>
                                                    </tr>  --}}

                                                    <tr>
                                                        <td>@lang("admin.location")</td>
                                                        <td>
                                                            {!! Form::text("location", auth()->user()->location, ["class" => "form-control"]) !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>@lang("admin.profession")</td>
                                                        <td>
                                                            {!! Form::text("profession", auth()->user()->profession, ["class" => "form-control"]) !!}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <p style="float: right; margin-bottom: 10px">@lang("langue.your_created_at") {{ auth()->user()->created_at->format("d. M. Y") }}</p>
                                            <br>
                                            <br>
                                            <div class="block2-txt p-t-15" style="float:right; with: 25%;">
                                                {!! Form::submit(trans("admin.upload"), ["class" => "size1 bg4 hov1 s-text1", "style" => "vertical-align: baseline; padding: 6px 14px; cursor: pointer;"]) !!}
                                                <br><br>
                                            </div>
                                        </div>

                                    {!! Form::close() !!}

                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 border" style=" /* border-radius: 5px; */ ">
                        <br>
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Suggestions</h4>
                        </div>
                        <br>
                        <div class="text-left">

                            <div class="team-img">
                                <div style="margin: 4px 0 15px 0;">
                                    <img src="http://via.placeholder.com/40x40" alt="" style="margin-right: 8px; float: left;">
                                    <span>
                                        wadad
                                        awdawd
                                        <p>
                                           wdawd dawd
                                        </p>
                                    </span>
                                    <p>
                                        lorem awd  awd aw aw awd awd awd dwa awd awd awd aw
                                    </p>
                                </div>

                                <div style="margin: 4px 0 15px 0;">
                                    <img src="http://via.placeholder.com/40x40" alt="" style="margin-right: 8px; float: left;">
                                    <span>
                                        wadad
                                        awdwdawd dawd awd
                                        <p>

                                        </p>
                                    </span>
                                    <p>
                                        lorem awd  awd aw aw awd awd awd dwa awd awd awd aw
                                    </p>
                                </div>

                                <div style="margin: 4px 0 15px 0;">
                                    <img src="http://via.placeholder.com/40x40" alt="" style="margin-right: 8px; float: left;">
                                    <span>wdawd dawd
                                        wadad
                                        awdawd
                                        <p>

                                        </p>
                                    </span>
                                    <p>
                                        lorem awd  awd aw aw awd awd awd dwa awd awd awd aw
                                    </p>
                                </div>

                            </div>

                        </div>

                        <div class="panel panel-white">
                            <br>
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

            <!-- Tab01 -->
            <div class="tab01">
            </div>
        </div>
    </section>
@endsection
