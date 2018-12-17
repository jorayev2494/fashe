@extends('admin.layouts.admin_master')

@section('content')
    <div id="main-wrapper">
        <div class="row">

            <div class="col-md-12">
                <div class="profile-timeline">

                    <ul class="list-unstyled">

                        <li class="timeline-item">

                            <div class="panel panel-white">

                                <div style="float: right; margin-bottom: 10px">

                                    {!! Form::open(["url" => route("admin.orders.update", [$order["order"]->id]), "method" => "PUT"]) !!}
                                        <label for="active">@lang("langue.processed")</label>
                                        {!! Form::checkbox("status", null, $order["order"]->status ? true : false, ["class" => "form-control", "id" => "active"]) !!}
                                        {!! Form::submit(trans('admin.update'), ["class" => "btn btn-default", "id" => "enable"]) !!}
                                    {!! Form::close() !!}

                                    {{-- <a href="{{ route('admin.orders.edit', $order['order']->id) }}" class="btn btn-default">@lang('admin.edit')</a> --}}
                                </div>

                                <table id="user" class="table table-hover table-striped" style="clear: both">
                                    <tbody>
                                        <tr>
                                            <td style="width: 35%;">
                                                @lang("admin.title")
                                            </td>
                                            <td style="width: 65%;">
                                                <img src="{{ $order['order']->products[0]->getImage() }}" style="margin-right: 20px; float: left;" width="160" height="217" alt="{{ $order['order']->products[0]->getImage() }}">
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
                                        </tr>

                                        <tr>
                                            <td>
                                                @lang("langue.customer")
                                            </td>
                                            <td>
                                                {{-- {{ dd($order["this_customer"]) }} --}}
                                                {{ $order["this_customer"]->name_customer ?? $order["this_customer"]->name }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="role_link">@lang("admin.lastname")</label>
                                            </td>
                                            <td>
                                                {{ $order["this_customer"]->last_name ?? $order["this_customer"]->lastname }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="role_link">@lang("admin.email")</label>
                                            </td>
                                            <td>
                                                {{ $order["this_customer"]->email ?? $order["this_customer"]->email }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="role_link">@lang("admin.phone")</label>
                                            </td>
                                            <td>
                                                {{ $order["this_customer"]->phone ?? $order["this_customer"]->email }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="role_link">@lang("admin.address")</label>
                                            </td>
                                            <td>
                                                {{ $order["this_customer"]->address ?? $order["this_customer"]->location }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label for="role_link">@lang("langue.shipping")</label>
                                            </td>
                                            <td>
                                                {{ $order["this_customer"]->shipping ?? $order["this_customer"]->location }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <br>
                                    <div style="float: right; margin-bottom: 10px">
                                        {!! Form::open(["url" => route("admin.orders.destroy", [$order["order"]->id]), "method" => "DELETE"]) !!}
                                            {!! Form::submit(trans('admin.delete'), ["class" => "btn btn-danger", "id" => "enable"]) !!}
                                        {!! Form::close() !!}
                                    </div>
                                <br>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>

            {{-- <div class="col-md-4">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">@lang("admin.users")</h4>
                    </div>
                    <div class="panel-body">
                        <ol>

                            @forelse ($order->users as $user)
                                <li>
                                    <a href="{{ route('admin.users.show', ['id' => $user->id]) }}">{{ $user->email }}</a>
                                </li>
                            @empty
                                @lang("admin.empty")
                            @endforelse

                        </ol>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
