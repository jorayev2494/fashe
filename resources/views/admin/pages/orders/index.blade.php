@extends('admin.layouts.admin_master')


@section('content')
    <div class="panel panel-white">
        <a href="#" disabled class="btn btn-success m-b-sm">@lang('admin.add')</a>

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
                            <th>@lang("admin.processing_order")</th>
                            {{-- <th>@lang("admin.active")</th> --}}
                            <th>@lang("admin.action")</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- {{ dd($orders) }} --}}

                        @foreach ($orders as $key => $order)

                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td scope="row">
                                    {{ $order["this_customer"]->name_customer ?? $order["this_customer"]->name }}
                                </td>
                                <td>
                                    <img src="{{ $order['order']->products[0]->getImage() }}" style="margin-right: 10px; float: left;" width="40" height="53.5" alt="{{ $order['order']->products[0]->getImage() }}">
                                    <p class="text-info">
                                        {{ $order["order"]->products[0]->name }}
                                    </p>
                                    <p class="text-danger" style="float: left;" >
                                        ${{ $order['order']->price_once . " x " . $order['order']->count }}
                                    </p>
                                    <p class="text-success" style="float: right;" >
                                        ${{ $order['order']->summa }}
                                    </p>
                                </td>
                                {{-- <td>{{ $role->prefix }}</td> --}}
                                {{-- <td>
                                    {{ count($role->products) ? $role->products->count() : trans("admin.empty") }}
                                </td> --}}
                                <td>
                                    @if ($order['order']->status)
                                        <p class="text-success">@lang("admin.processed")</p>
                                    @else
                                        <p class="text-danger">@lang("admin.not_processed")</p>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-addon" style="float: left; margin-right: 10px;" href="{{ route('admin.orders.show', $order['order']->id) }}">
                                        @lang("admin.info")
                                    </a>
                                    <br><br>
                                    {!! Form::open(["url" => route("admin.orders.destroy", [$order['order']->id]), "method" => "DELETE"]) !!}
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

