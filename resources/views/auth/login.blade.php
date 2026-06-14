<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>
</head>

<body>
<div id="wrapper">

    <div class="card border-primary border-top-sm border-bottom-sm card-authentication1 mx-auto my-5 animated bounceInDown">
        <div class="card-body">
            <div class="card-content p-2">

                <div class="text-center">
                    <img src="{{ asset('assets/images/logo-icon.png') }}" alt="logo">
                </div>

                <div class="card-title text-uppercase text-center py-3">
                    Sign In
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control form-control-rounded @error('email') is-invalid @enderror"
                                placeholder="Email"
                                required
                                autofocus
                            >

                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>

                            @error('email')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="position-relative has-icon-right">
                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-rounded @error('password') is-invalid @enderror"
                                placeholder="Password"
                                required
                            >

                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>

                            @error('password')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mr-0 ml-0">
                        <div class="form-group col-6">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Remember me</label>
                            </div>
                        </div>

                        <div class="form-group col-6 text-right">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    Reset Password
                                </a>
                            @endif
                        </div>
                    </div>

                    <button type="submit"
                        class="btn btn-primary shadow-primary btn-round btn-block">
                        Sign In
                    </button>
                </form>

            </div>
        </div>
    </div>

</div>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>
</html>
