@extends('admin.layouts.admin_master')


@section('content')
    <div class="panel panel-white">
        <a href="{{ route('admin.menus.create') }}" class="btn btn-success m-b-sm">@lang('admin.add_product')</a>

        <div class="panel-heading clearfix">
            <h4 class="panel-title">Bordered</h4>
        </div>

        {{--  {{ dd($menus->toArray()) }}  --}}

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang("admin.title")</th>
                            <th>@lang("admin.prefix")</th>
                            <th>@lang("admin.categories")</th>
                            <th>@lang("admin.active")</th>
                            <th>@lang("admin.action")</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($menus as $key => $menu)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ trans("langue." . $menu->name) }}</td>
                                <td>{{ $menu->prefix }}</td>
                                <td>
                                    {{ count($menu->categories) ? $menu->categories->count() : trans("admin.empty") }}
                                </td>
                                <td>

                                    @if ($menu->active)
                                        <p class="text-success">@lang("admin.active")</p>
                                    @else
                                        <p class="text-danger">@lang("admin.not_active")</p>
                                    @endif

                                </td>
                                <td>
                                    <a class="btn btn-info btn-addon" style="float: left; margin-right: 10px;" href="{{ route('admin.menus.show', $menu->id) }}">
                                        @lang("admin.info")
                                    </a>
                                    {!! Form::open(["url" => route("admin.menus.destroy", [$menu->id]), "method" => "DELETE"]) !!}
                                        {!! Form::submit(trans('admin.delete'), ["class" => "btn btn-danger", "id" => "enable"]) !!}
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

