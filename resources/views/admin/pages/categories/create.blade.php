@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">


        {!! Form::open(["url" => route('admin.categories.store'), "method" => "POST", 'enctype' => 'multipart/form-data']) !!}

            {{--  Просморт картинку  --}}
            <div class="panel panel-white" id="js-alerts">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Mousewheel Zoom</h4>
                </div>
                <div class="panel-body">
                    <img id="zoom_04" src="{{ $defaultImage }}" data-zoom-image="{{ $defaultImage }}" style="width: 100%;" alt="{{ $defaultImage }}"/>
                </div>

                <br>
                {{-- <p>fesfesf</p> --}}
                {!! Form::file("image", ["class" => "form-control"]) !!}


            </div>

            <div class="row">

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
                                                    {!! Form::text("category_title", old("category_title"), ["class" => "form-control", "id" => "category_title", "placeholder" => trans("admin.category_title")]) !!}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="category_link">@lang("admin.link")</label>
                                                </td>
                                                <td>
                                                    <select name="menu_id" class="form-control" id="category_link">
                                                        <option selected value="null">@lang("admin.select_menu")</option>
                                                        @foreach ($menus as $menu)
                                                            <option value="{{ $menu->id }}">@lang("langue." . $menu->prefix)</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="category_link">@lang("admin.link")</label>
                                                </td>
                                                <td>
                                                    {!! Form::text("category_link", old("category_link"), ["class" => "form-control", "id" => "category_link", "placeholder" => env("APP_URL") . "your_category"]) !!}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>

        {!! Form::close() !!}

    </div>
@endsection
