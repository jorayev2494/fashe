@extends("fashe.layouts.app_master")


@section('content')
    <!-- Title Page -->
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url( {{ $category ? $category->getImage() : asset('fashe') . '/images/heading-pages-02.jpg' }} );">
        <h2 class="l-text2 t-center">
            {{ $title }}
        </h2>
        <p class="m-text13 t-center">
            New Arrivals Women Collection 2018
        </p>
    </section>


    <!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">

			<div class="row">
                {{-- Sidebar --}}
                @include('fashe.includes.products_sidebar', ["category" => $category])

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->

					{{-- <!-- Продукты --> --}}
                    @include("fashe.includes.products", ["products" => $products])


                    @if ($paginate)
                        {{-- {{ $products->render("vendor.pagination.default") }} --}}
                    @endif

					<!-- Pagination -->
					{{--  <div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                    </div>  --}}

				</div>
            </div>

		</div>
	</section>


@endsection
