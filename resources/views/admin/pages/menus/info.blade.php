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
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-default">@lang('admin.edit')</a>
                                </div>

                                <table id="user" class="table table-hover table-striped" style="clear: both">
                                    <tbody>
                                        <tr>
                                            <td style="width: 35%;">
                                                <label for="menu_name">@lang("admin.title")</label>
                                            </td>
                                            <td style="width: 65%;">
                                                {{ $menu->name ? $menu->name : trans("admin.empty") }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="menu_prefix">@lang("admin.prefix")</label>
                                            </td>
                                            <td>
                                                {{ $menu->prefix ? trans("langue." . $menu->prefix) : trans("admin.empty") }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="menu_count_products">@lang("admin.menu_count_products")</label>
                                            </td>
                                            <td>
                                                {{ count($menu->categories) ? $menu->categories->count() : trans("admin.empty") }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <br>
                                    <div style="float: right; margin-bottom: 10px">
                                        {!! Form::open(["url" => route("admin.menus.destroy", [$menu->id]), "method" => "DELETE"]) !!}
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
                        <h4 class="panel-title">@lang("admin.products")</h4>
                    </div>
                    <div class="panel-body">
                        <ol>

                            @forelse ($menu->categories as $category)
                                <li>{{ $category->name }}</li>
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
