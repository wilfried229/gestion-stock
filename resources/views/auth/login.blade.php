@extends('auth.layout')
@section('title_page') Login @endsection
@section('content')


    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{asset('img/login2.png')}}" alt="login-image">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-black">Connexion</h2>
                        </div>
                        <form method="post" action="{{route('login')}}">
                            @csrf
                            <div class="input-group custom">
                                <input name="email" type="email" class="form-control form-control-lg @if($errors->has('email')) is-invalid @endif" value="{{old('email')}}" placeholder="Adresse email">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group custom">
                                <input name="password" type="password" class="form-control form-control-lg @if($errors->has('password')) is-invalid @endif" placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row pb-30">
                                <!--div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input id="customCheck1" class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck1">Rester connecter</label>
                                    </div>
                                </div-->
                                <div class="col-6">
                                    <div class="forgot-password"><a href="{{ route('password.request') }}">Mot de passe oublié</a></div>
                                </div>
                            </div>
                            @if($errors->has('g-recaptcha-response'))
                                <div class="row alert alert-danger">
                                    <span role="alert">
                                        <strong>"Je ne suis pas un robot" est requis</strong>
                                    </span>
                                </div>
                            @endif
                            <div class="form-group row">
                                <div data-callback="verifyCallback"
                                     data-expired-callback="expCallback"
                                     class="col-12 text-danger g-recaptcha" align="center" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button id=""  type="submit" class="btn text-white btn-danger btn-lg btn-block">Se connecter</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('moreJS')
    <script>
        /**
         * Handle captcha response
         * @param response
         */
        function verifyCallback(response) {
            if((response || '').length > 0) {
                document.getElementById('submitButtonForm').removeAttribute('disabled');
            } else {
                document.getElementById('submitButtonForm').setAttribute("disabled", "disabled");
            }
        }

        /**
         * Reset captcha
         */
        function expCallback() {
            document.getElementById('submitButtonForm').setAttribute("disabled", "disabled");
        }
    </script>
@endsection
