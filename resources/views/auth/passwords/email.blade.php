@extends("admin.layouts.admin_auth")

@section('content')
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

                    @include("includes.session")

                    {{-- <h4 class="login-title">Sign in to your account</h4> --}}
                    <h4 class="login-title">@lang("langue.sign_in_to_your_account")</h4>

                    {!! Form::open(["url" => route("password.email"), "method" => "POST"]) !!}

                        <div class="form-group">
                            {!! Form::label("email", trans("admin.email")) !!}
                            {!! Form::email("email", old("email"), ["class" => "form-control", "id" => "email"]) !!}
                        </div>

                        {!! Form::submit(trans("langue.password_reset"), ["class" => "btn btn-primary"]) !!} <br><br>
                        <a href="{{ route('login') }}" class="btn btn-default">@lang("langue.sign_in")</a>
                        <a href="{{ route('register') }}" class="btn btn-default">@lang("langue.create_account")</a><br>
                        <a href="{{ route('password.request') }}" class="forgot-link">@lang("langue.forgot_password")</a>

                   {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div><!-- /Page Content -->
@endsection
