@extends("fashe.layouts.app_profile")


@section('content')
    <div class="col-md-8 border" style=" /* border-radius: 5px; */ margin: 0 50px;">
        <div class="profile-timeline">
            <ul class="list-unstyled">
                <li class="timeline-item">

                    <div class="panel panel-white">
                        <div style="float: right; margin-bottom: 10px">
                            {{--  <label style="display: inline-block; margin-right: 50px">
                                <input type="checkbox" id="autoopen" style="vertical-align: baseline">&nbsp;auto-open next field
                            </label>  --}}


                            {{--  <div class="block2-txt p-t-20">
                                <a href="{{ route('profile.edit') }}" class="size1 bg4 hov1 s-text1" style="vertical-align: baseline; padding: 6px 14px;">@lang("admin.edit")</a>
                            </div>  --}}
                            <br>
                        </div>

                        <table id="user" class="table table-striped" style="clear: both">

                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>@lang("admin.image")</td>
                                    <td>@lang("admin.title")</td>
                                    <td>@lang("admin.processing_order")</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myOrders as $key => $order)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <img src="{{ $order->products[0]->getImage() }}" style="margin-right: 10px; float: left;" width="40" height="53.5" alt="{{ $order->products[0]->getImage() }}">
                                        </td>
                                        <td>
                                            <p>
                                                <a href="{{ route('show.product', ['id' => $order->products[0]->id]) }}" class="text-info" >{{ $order->products[0]->name }}</a>
                                            </p>
                                        </td>
                                        <td>
                                            @if ($order->status)
                                                <p class="text-success">@lang("admin.processed")</p>
                                            @else
                                                <p class="text-danger">@lang("admin.not_processed")</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <p style="float: right; margin-bottom: 10px">@lang("langue.your_created_at") {{ auth()->user()->created_at->format("d. M. Y") }}</p>
                        <br>

                    </div>

                </li>
            </ul>
        </div>
    </div>
@endsection
