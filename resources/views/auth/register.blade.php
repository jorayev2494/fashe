@extends("admin.layouts.admin_auth")

@section('content')
    <div class="page-container">
        <!-- Page Inner -->
        <div class="page-inner login-page">
            <div id="main-wrapper" class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-md-3 login-box">
                        <br>
                        <a href="{{ route('index') }}" class="logo-mobile">
                            <img src="{{ asset('fashe') }}/images/icons/logo.png" alt="IMG-LOGO">
                        </a>

                        <br><br><br>

                        {{-- Ощибки Сессии --}}
                        @include("includes.session")

                        <h4 class="login-title">@lang("langue.create_account")</h4>

                        {!! Form::open(["url" => route("register"), "method" => "POST"]) !!}

                            <div class="form-group">
                                {!! Form::label("name", trans("admin.name")) !!}
                                {!! Form::text("name", old("name"), ["class" => "form-control", "id" => "name"]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label("last_name", trans("admin.lastname")) !!}
                                {!! Form::text("last_name", old("last_name"), ["class" => "form-control", "id" => "last_name"]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label("email", trans("admin.email")) !!}
                                {!! Form::email("email", old("email"), ["class" => "form-control", "id" => "email"]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label("password", trans("admin.password")) !!}
                                {!! Form::password("password", ["class" => "form-control", "id" => "password"]) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label("password_confirmation", trans("admin.password_confirmation")) !!}
                                {!! Form::password("password_confirmation", ["class" => "form-control", "id" => "password_confirmation"]) !!}
                            </div>

                            {!! Form::submit(trans("langue.register"), ["class" => "btn btn-primary"]) !!}

                            <a href="{{ route('login') }}" class="btn btn-default">@lang("langue.sign_in")</a><br>
                            <a href="{{ route('password.request') }}" class="forgot-link">@lang("langue.forgot_password")</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div><!-- /Page Content -->
    </div><!-- /Page Container -->
@endsection
