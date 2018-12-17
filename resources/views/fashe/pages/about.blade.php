
@extends("fashe.layouts.app_master")


@section('content')
    <!-- Title Page -->
    {{--  <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('fashe') }}/images/heading-pages-06.jpg);">
        <h2 class="l-text2 t-center">
            About
        </h2>
    </section>  --}}

    <!-- content page -->
	<section class="bgwhite p-t-66 p-b-38">
		<div class="container">
			<div class="row">
				<div class="col-md-4 p-b-30">
					<div class="hov-img-zoom">
						<img src="{{ asset('fashe') }}/about/image/JOBS.jpg" alt="IMG-ABOUT">
					</div>
				</div>

				<div class="col-md-8 p-b-30">
					<h3 class="m-text26 p-t-15 p-b-16">
						Наша история
					</h3>

					<p class="p-b-28">
                        Это сайт сознано для протфолио!
                        Полне работающий сайт Интернет магазин!
						{{--  Phasellus egestas nisi nisi, lobortis ultricies risus semper nec. Vestibulum pharetra ac ante ut pellentesque. Curabitur fringilla dolor quis lorem accumsan, vitae molestie urna dapibus. Pellentesque porta est ac neque bibendum viverra. Vivamus lobortis magna ut interdum laoreet. Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula. Vivamus tristique vulputate ultricies. Sed vitae ultrices orci.  --}}
					</p>

					<div class="bo13 p-l-29 m-l-9 p-b-10">
						<p class="p-b-11">
                                Креативность только соединение вещей. Когда вы просите творческие человек, как они сделали что-то, что они чувствуют себя немного виноватыми, потому что они на самом деле не делают это, они только что видели что-то. Казалось очевидным, к ним через некоторое время.
							{{--  Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didnt really do it, they just saw something. It seemed obvious to them after a while.  --}}
						</p>

						<span class="s-text7">
							- Стив Джобс
						</span>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
