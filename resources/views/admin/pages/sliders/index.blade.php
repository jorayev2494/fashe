@extends('admin.layouts.admin_master')


@section('content')
    <div class="panel panel-white">
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-success m-b-sm">@lang('admin.add_product')</a>

        <div class="panel-heading clearfix">
            <h4 class="panel-title">Bordered</h4>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang("admin.title")</th>
                            <th>@lang("admin.image")</th>
                            <th>@lang("admin.info")</th>
                            <th>@lang("admin.link")</th>
                            <th>@lang("admin.active")</th>
                            <th>@lang("admin.action")</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($sliders as $key => $slide)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $slide->title }}</td>
                                <td>
                                    <center>
                                        <a href="{{ route('admin.sliders.show', $slide->id) }}">
                                            <img src="{{ $slide->getImage() }}" width="100" height="40" alt="{{ $slide->getImage() }}">
                                        </a>
                                    </center>
                                </td>
                                <td>{{ $slide->info }}</td>
                                <td>{{ $slide->link }}</td>

                                <td>
                                    @if ($slide->active)
                                        <p class="text-success">@lang("admin.active")</p>
                                    @else
                                        <p class="text-danger">@lang("admin.not_active")</p>
                                    @endif
                                </td>

                                <td>
                                    <a class="btn btn-info btn-addon" style="float: left; margin-right: 10px;" href="{{ route('admin.sliders.show', $slide->id) }}">
                                        @lang("admin.info")
                                    </a>
                                    {{-- {!! Form::open(["url" => route("admin.sliders.destroy", [$slide->id]), "method" => "DELETE"]) !!}
                                        {!! Form::submit(trans('admin.delete'), ["class" => "btn btn-danger", "id" => "enable"]) !!}
                                    {!! Form::close() !!} --}}
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

