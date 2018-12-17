
@extends("fashe.layouts.app_master")


@section('content')
    <!-- Title Page -->
	{{--  <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{ asset('fashe') }}/images/heading-pages-06.jpg);">
		<h2 class="l-text2 t-center">
            Контакт
		</h2>
	</section>  --}}

    <!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">

				{{--  <div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21" id="google_map" data-map-x="40.614439" data-map-y="-73.926781" data-pin="{{ asset('fashe') }}/images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
					</div>
				</div>  --}}

				<div class="col-md-12 p-b-30">

                    {{-- Подкляцение вывод Сесси --}}
                    @include("includes.session")

                    {!! Form::open(["url" => route('contact'), "method" => "POST", "class" => "leave-comment"]) !!}

                        <h4 class="m-text26 p-b-36 p-t-15">
                            @lang("langue.send_us_message")
                            {{-- Send us your message --}}
                        </h4>

                        <div class="bo4 of-hidden size15 m-b-20">
                            {!! Form::text("name", old("name"), ["class" => "sizefull s-text7 p-l-22 p-r-22", "placeholder" => trans("langue.full_name")]) !!}
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            {!! Form::text("phone_number", old("phone_number"), ["class" => "sizefull s-text7 p-l-22 p-r-22", "placeholder" => trans("langue.phone_number")]) !!}
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            {!! Form::text("email", old("email"), ["class" => "sizefull s-text7 p-l-22 p-r-22", "placeholder" => trans("langue.email_address")]) !!}
                        </div>

                        {!! Form::textarea("message", old("message"), ["class" => "dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20", "placeholder" => trans("langue.message")]) !!}

                        <div class="w-size25">
                            <!-- Button -->
                            {!! Form::submit(trans("langue.send"), ["class" => "flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4"]) !!}
                        </div>

                    {!! Form::close() !!}

				</div>
			</div>
		</div>
	</section>

@endsection
