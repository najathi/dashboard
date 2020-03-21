<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TAS - Login</title>

	<!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

	<!-- Styles -->
    <link href="{{ asset('asset') }}/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('asset') }}/css/lib/themify-icons.css" rel="stylesheet">
    <link href="{{ asset('asset') }}/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('asset') }}/css/lib/simdahs.css" rel="stylesheet">
    <link href="{{ asset('asset') }}/css/style.css" rel="stylesheet">


    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

</head>

<body class="bg-primary">

	<div class="unix-login">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="login-content">
						<div class="login-logo">
							<a href=""><span>Travel Agency System</span></a>
						</div>
						<div class="login-form">
							<h4>Users Login</h4>
							<form method="POST" action="{{ route('login') }}">
                                @csrf

								<div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span>
                                    @enderror

								</div>
								<div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span>
                                    @enderror

								</div>
								<div class="checkbox">
									<label>
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </label>

                                    <!--
									<label class="pull-right">
										@if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </label>
                                    --!>

								</div>
								<button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <!--
                                <div class="register-link m-t-15 text-center">
									<p>Do not have account ? <a href="page-register.html"> Sign Up Here</a></p>
                                </div>
                                --!>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
