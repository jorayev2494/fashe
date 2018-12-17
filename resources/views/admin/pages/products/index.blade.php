@extends('admin.layouts.admin_master')


@section('content')
    <div class="panel panel-white">
        <div class="panel-heading">
            <h4 class="panel-title">Add rows</h4>
        </div>
        <div class="panel-body">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success m-b-sm">@lang('admin.add_product')</a>

            <div class="table-responsive">
                <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                    <thead>
                        <tr>
                            <th>{{ trans("admin.product_name") }}</th>
                            <th>{{ trans("admin.product_image") }}</th>
                            <th>{{ trans("admin.categories") }}</th>
                            <th>{{ trans("admin.product_status") }}</th>
                            <th>{{ trans("admin.price") }}</th>
                            {{-- <th>{{ trans("admin.product_size") }}</th> --}}
                            {{-- <th>{{ trans("admin.color") }}</th> --}}
                            {{-- <th>{{ trans("admin.count") }}</th> --}}
                            {{-- <th>{{ trans("admin.description") }}</th> --}}
                            <th>{{ trans("admin.action") }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr class="{{ ($product->active) ? null : 'danger' }}">
                                <td >{{ $product->name }}</td>
                                <td>
                                    @foreach ((array)$product->getPhotos() as $photo)
                                        <div class="col-md-3">
                                            <div class="panel-body">
                                                <img id="zoom_04" src="{{ $photo }}" data-zoom-image="{{ $photo }}" width="25" alt="{{ str_limit($photo, 100) }}"/>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td >{{ $product->categories[0]->name }}</td>
                                {{-- <td >{{ trans("admin." . $product->categories[0]->link) }}</td> --}}
                                <td>{{ $product->status->prefix or trans("admin.empty") }}</td>
                                <td>{{ $product->price }}</td>
                                {{-- <td>{{ str_limit($product->size, 5) }}</td>
                                <td>{{ str_limit($product->color, 5) }}</td> --}}
                                {{-- <td>{{ $product->count }}</td> --}}
                                {{-- <td>{{ str_limit($product->description, 10) }}</td> --}}
                                <td>
                                    <a class="btn btn-info btn-addon" href="{{ route('admin.products.show', $product->id) }}">
                                        @lang("admin.info")
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    {{-- <tfoot>
                        <tr>
                            <th>{{ trans("admin.product_name") }}</th>
                            <th>{{ trans("admin.product_image") }}</th>
                            <th>{{ trans("admin.product_status") }}</th>
                            <th>{{ trans("admin.price") }}</th>
                            <th>{{ trans("admin.product_size") }}</th>
                            <th>{{ trans("admin.color") }}</th>
                            <th>{{ trans("admin.count") }}</th>
                            <th>{{ trans("admin.description") }}</th>
                            <th>{{ trans("admin.action") }}</th>
                        </tr>
                    </tfoot> --}}
                </table>
                {{-- {{ $products->links("vendor.pagination.admin") }} --}}
            </div>
        </div>
    </div>
@endsection

