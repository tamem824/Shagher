<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Shager</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('website/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/animate.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/fonts.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/owl.theme.default.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}"/>
    <link rel="shortcut icon" href="{{ asset('website/images/fav-icon.png') }}" type="image/png"/>
</head>
<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status">
        <img src="{{ asset('website/images/preloader.svg') }}" id="preloader_image" alt="loader">
    </div>
</div>

<div class="login_box_main_wrapper" id="login_height">
    <div class="container">


        <!-- Laravel session message -->
        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />
        <div class="signin-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="left-side">
                        <h4 class="mb-4">Sign In</h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="form-group field-icon">
                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="form-group field-icon">
                                <input type="password" name="password" placeholder="Password" required>
                                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="round mb-3">
                                <input type="checkbox" id="remember_me" name="remember">
                                <label for="remember_me"><span>Remember Me</span></label>
                            </div>

                            <!-- Submit Button -->
                            <div class="login-btn-sec mb-3">
                                <button type="submit" class="sub-btn w-100">
                                    <span>Sign In</span>
                                </button>
                            </div>

                            <!-- Forgot Password -->
                            <div class="text-center mb-3">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                                @endif
                            </div>

                            <!-- Social Buttons -->
                            <div class="social-btn text-center">
                                <span>- OR -</span>
                                <ul class="d-flex justify-content-center list-unstyled mt-2">
                                    <li class="mx-2">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="mx-2">
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="mx-2">
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Register Link -->
                            <p class="text-center mt-3">Don't have an account? <a href="{{ route('register') }}">Sign Up now!</a></p>
                        </form>
                    </div>
                </div>

                <!-- Side Image -->
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="login-img">
                        <img src="{{ asset('website/images/login-side.png') }}" alt="img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="{{ asset('website/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('website/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('website/js/wow.js') }}"></script>
<script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('website/js/custom.js') }}"></script>

<!-- Set login box height dynamically -->
<script>
    const types = ['load', 'resize'];
    types.forEach(function (type) {
        window.addEventListener(type, () => {
            let elem = document.getElementById('login_height');
            let wh = window.innerHeight;
            elem.style.height = wh + 'px';
        });
    });
</script>
</body>
</html>
