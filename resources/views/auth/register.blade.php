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

<body class="page-bg">


<div class="login_box_main_wrapper custom-height" id="login_height">
    <div class="container">
        <div class="login-logo gap-top text-center">
            <img src="{{ asset('website/images/fav-icon.png') }}" alt="logo" class="img-fluid logo-img">
        </div>

        <div class="form-tabs">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">User</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Company</button>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile-tab" role="tabpanel" aria-labelledby="pills-home-tab">

                <div class="signin-wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="left-side">
                                <h4>Sign Up as Freelance</h4>
                                <form action="{{ route('register.freelancer') }}" method="POST" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="password_confirmation">Re-type Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Re-type Password" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number">
                                    </div>


                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="{{ \App\Gender::Male->value }}">Male</option>
                                            <option value="{{ \App\Gender::Female->value }}">Female</option>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" name="address" class="form-control" placeholder="Address">
                                    </div>


                                    <div class="form-group">
                                        <label for="photo">Profile Photo</label>
                                        <input type="file" id="photo" name="photo" class="form-control">
                                    </div>

                                    <!-- المهارات -->
                                    <div class="form-group">
                                        <label for="skills_id">Skills</label>
                                        <select id="skills_id" name="skills_id" class="form-control" required>
                                            <option value="">Select a skill</option>
                                            @foreach ($skills as $skill)
                                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>




                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <select id="experience" name="experience" class="form-control" required>
                                    <option value="">Select Experience</option>
                                    @foreach (\App\Experience::cases() as $experience)
                                        <option value="{{ $experience->value }}">{{ $experience->label() }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group">
                                <label for="career_level_id">Career Level</label>
                                <select id="career_level_id" name="career_level_id" class="form-control" required>
                                    <option value="">Select Career Level</option>
                                    @foreach ($careerLevels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                        <label class="form-check-label" for="terms">Yes, I understand and agree to the Terms & Conditions</label>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                </form>


                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                <div class="signin-wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="left-side">
                                <h4>Sign Up as Company</h4>
                                <form method="POST" action="{{ route('register.company') }}" enctype="multipart/form-data">
                                    @csrf



                                    <div class="form-group field-icon row mb-3">
                                        <div class="col-md-12">
                                            <input type="text" name="name" placeholder="Full Name" required>
                                            <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group field-icon row mb-3">
                                        <div class="col-md-12">
                                            <input type="email" name="email" placeholder="Email" required>
                                            <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group field-icon row mb-3">
                                        <div class="col-md-12">
                                            <input type="text" name="address" placeholder="Address">
                                            <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group field-icon row mb-3">
                                        <div class="col-md-12">
                                            <input type="text" name="phone_number" placeholder="Phone Number">
                                            <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                                        </div>
                                    </div>



                                    <div class="form-group field-icon row mb-3">
                                        <div class="col-md-12">
                                            <input type="file" name="photo" accept="image/*">
                                        </div>
                                    </div>

                                    {{-- New company URI field --}}
                                    <div class="form-group field-icon row mb-3">
                                        <div class="col-md-12">
                                            <input type="text" name="uri" placeholder="Company URI (e.g., my-company)" required>
                                            <span><i class="fa fa-link" aria-hidden="true"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group field-icon row mb-3">
                                        <div class="col-md-12">
                                            <input type="password" name="password" placeholder="Password" required>
                                            <span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group field-icon row mb-3">
                                        <div class="col-md-12">
                                            <input type="password" name="password_confirmation" placeholder="Re-type Password" required>
                                            <span><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                        </div>
                                    </div>

                                    <div class="cond">
                                        <input type="checkbox" name="terms" required>
                                        <label> Yes, I understand and agree to the Terms & Conditions.</label>
                                    </div>

                                    <div class="login-btn-sec">
                                        <button type="submit" class="sub-btn"><span>Register Company</span></button>

                                        <div class="social-btn">
                                            <span>- OR -</span>
                                            <ul>
                                                <!-- Social media icons -->
                                            </ul>
                                        </div>

                                        <p>Already have an account? <a href="{{ route('login') }}">Sign In now!</a></p>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer-form">
            <p>© Copyright 2020. All Rights Reserved by Webstrot</p>
        </div>
    </div>
</div>



<!-- Side Panel -->
<script src="{{asset('website/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('website/js/wow.js')}}"></script>
<script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('website/js/custom.js')}}"></script>

<!-- custom js-->
<script>
    const types = ['load', 'resize'];
    types.forEach(function(type){
        window.addEventListener(type, () => {
            let elem = document.getElementById('login_height');
            let wh = window.innerHeight;
            elem.style.height = wh + 'px';
        });
    });

</script>
</body>

</html>

