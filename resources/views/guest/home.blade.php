
<x-guest.layouts.app :categories="$categories" >
    <div class="index2-slider-wrapper ps-rel">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="slider-caption">
                        <h2>The Easy Way To Get Your New Job</h2>
                        <p>The most complete job portal software having over 70 million unique visitors <br> every day with
                            verified, up-to-date job listings directly from the employers.</p>
                    </div>
                    <div class="slider-form mt-4 float_left">
                        <form method="GET" action="{{ route('guest.jobs.index') }}">
                            <div class="form-group mb-4 row">
                                <div class="col-md-6 col-12 field-icon">
                                    <input type="text" name="search" placeholder="Search" class="form-control" value="{{ request('search') }}">
                                    <span><i class="fa fa-search" aria-hidden="true"></i></span>
                                </div>

                                <div class="col-md-6 col-12 field-icon">
                                    <div class="select-field">
                                        <select name="location" class="form-control">
                                            <option value="">Search Location</option>
                                            @foreach($locations as $location)
                                                <option value="{{ $location->name }}" {{ request('location') == $location->name ? 'selected' : '' }}>
                                                    {{ $location->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span><i class="fa fa-dot-circle-o" aria-hidden="true"></i></span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 col-12 field-icon">
                                    <div class="select-field">
                                        <select name="category" class="form-control">
                                            <option value="">Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->name }}" {{ request('category') == $category->name ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span><i class="fa fa-th" aria-hidden="true"></i></span>
                                </div>

                                <div class="col-md-6 col-12 field-icon">
                                    <div class="select-field">
                                        <select name="experience" class="form-control">
                                            <option value="">Select Experience</option>
                                            @foreach(\App\Experience::cases() as $experience)
                                                <option value="{{ $experience->value }}" {{ request('experience') == $experience->value ? 'selected' : '' }}>
                                                    {{ $experience->label() }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span><i class="fa fa-bar-chart" aria-hidden="true"></i></span>
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-pink" style="background-color: #e83e8c; border-color: #e83e8c; color: white;">
                                    <i class="fa fa-search me-2" aria-hidden="true"></i> Search
                                </button>
                            </div>



                        </form>

                        <div class="play-sec float_left">
                            <div class="play-icon">
                                <a href="{{asset('/website/javascript:;')}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                                        class="fa fa-play" aria-hidden="true"></i></a>
                            </div>
                            <div class="play-text">
                                <h4>See For Yourself!</h4>
                                <p>How it works & experience the ultimate joy.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="index2-slider-img">
                        <img src="{{asset('/website/images/index2/slider-img.png')}}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popular-category-wrapper float_left">
        <div class="container">
            <div class="home1-section-heading1">
                <h6>Professional By Category</h6>
                <h4>Popular Categories</h4>
            </div>
            <div class="popular-category-main-box float_left">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="category-box float_left">
                                <span><i class="{{ $category->image }}" aria-hidden="true"></i></span>
                                <h4>{{ $category->name }}</h4>
                                <div class="category-overlay float_left">
                                    <h5>{{ $category->name }}</h5>
                                    <p>{{ $category->description }}</p>
                                    <a href="{{route('guest.categories.show',$category->id)}}">Explore <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <div class="employment-main-wrapper float_left">
        <div class="container">
            <div class="home1-section-heading1">
                <h6>How it Work</h6>
                <h4>Find Job, Employment</h4>
            </div>
            <div class="employe-job-box float_left">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="employ-text-box">
                            <div class="employ-icon">
                                 <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                                       <path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"/>
                                    </svg>
                                    <span class="num">
                                       <small>1</small>
                                    </span>
                                 </span>
                            </div>
                            <div class="employ-icon-text">
                                <a href="javascript:;">
                                    <h4>Register an Account</h4>
                                </a>
                                <p>Post a job tell us about your project. We’ll quick match you the right freelancers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="employ-text-box">
                            <div class="employ-icon user-job">
                                 <span>
                                    <svg version="1.1" id="Capa_21" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;"
                                         xml:space="preserve">
                                       <g>
                                          <path d="M52.179,39.929l-5.596,8.04l-3.949-3.241c-0.426-0.351-1.057-0.287-1.407,0.138c-0.351,0.427-0.289,1.058,0.139,1.407
                                             l4.786,3.929c0.18,0.148,0.404,0.228,0.634,0.228c0.045,0,0.091-0.003,0.137-0.01c0.276-0.038,0.524-0.19,0.684-0.419l6.214-8.929
                                             c0.315-0.453,0.204-1.076-0.25-1.392C53.117,39.36,52.495,39.475,52.179,39.929z"/>
                                          <path d="M47,32.5c-0.728,0-1.438,0.075-2.133,0.191c1.168-1.693,2.115-3.561,2.806-5.573C49.084,26.47,50,25.075,50,23.5v-4
                                             c0-0.963-0.36-1.896-1-2.625v-5.319c0.056-0.55,0.276-3.824-2.092-6.525C44.854,2.688,41.521,1.5,37,1.5s-7.854,1.188-9.908,3.53
                                             c-1.435,1.637-1.918,3.481-2.064,4.805C23.314,8.949,21.294,8.5,19,8.5c-10.389,0-10.994,8.855-11,9v4.579
                                             c-0.648,0.706-1,1.521-1,2.33v3.454c0,1.079,0.483,2.085,1.311,2.765c0.825,3.11,2.854,5.46,3.644,6.285v2.743
                                             c0,0.787-0.428,1.509-1.171,1.915l-6.653,4.173C1.583,47.134,0,49.801,0,52.703V56.5h14h2h24.104c2.002,1.26,4.362,2,6.896,2
                                             c7.168,0,13-5.832,13-13S54.168,32.5,47,32.5z M14,52.262V54.5H2v-1.797c0-2.17,1.184-4.164,3.141-5.233l6.652-4.173
                                             c1.333-0.727,2.161-2.121,2.161-3.641v-3.591l-0.318-0.297c-0.026-0.024-2.683-2.534-3.468-5.955l-0.091-0.396l-0.342-0.22
                                             C9.275,28.899,9,28.4,9,27.863v-3.454c0-0.36,0.245-0.788,0.671-1.174L10,22.938l-0.002-5.38C10.016,17.271,10.537,10.5,19,10.5
                                             c2.393,0,4.408,0.553,6,1.644v4.731c-0.64,0.729-1,1.662-1,2.625v4c0,0.304,0.035,0.603,0.101,0.893
                                             c0.027,0.116,0.081,0.222,0.118,0.334c0.055,0.168,0.099,0.341,0.176,0.5c0.001,0.002,0.002,0.003,0.003,0.005
                                             c0.256,0.528,0.629,1,1.099,1.377c0.005,0.019,0.011,0.036,0.016,0.054c0.06,0.229,0.123,0.457,0.191,0.68l0.081,0.261
                                             c0.014,0.046,0.031,0.093,0.046,0.139c0.035,0.108,0.069,0.216,0.105,0.322c0.06,0.175,0.123,0.355,0.196,0.553
                                             c0.031,0.083,0.065,0.156,0.097,0.237c0.082,0.209,0.164,0.411,0.25,0.611c0.021,0.048,0.039,0.1,0.06,0.147l0.056,0.126
                                             c0.026,0.058,0.053,0.11,0.079,0.167c0.098,0.214,0.194,0.421,0.294,0.622c0.016,0.032,0.031,0.067,0.047,0.099
                                             c0.063,0.125,0.126,0.243,0.189,0.363c0.108,0.206,0.214,0.4,0.32,0.588c0.052,0.092,0.103,0.182,0.154,0.269
                                             c0.144,0.246,0.281,0.472,0.414,0.682c0.029,0.045,0.057,0.092,0.085,0.135c0.242,0.375,0.452,0.679,0.626,0.916
                                             c0.046,0.063,0.086,0.117,0.125,0.17c0.022,0.029,0.052,0.071,0.071,0.097v3.309c0,0.968-0.528,1.856-1.377,2.32l-2.646,1.443
                                             l-0.649,0.354l-5.626,3.069C15.801,45.924,14,48.958,14,52.262z M16,54.5v-2.238c0-2.571,1.402-4.934,3.659-6.164l8.921-4.866
                                             C30.073,40.417,31,38.854,31,37.155v-4.018v-0.001l-0.194-0.232l-0.038-0.045c-0.002-0.003-0.064-0.078-0.165-0.21
                                             c-0.006-0.008-0.012-0.016-0.019-0.024c-0.053-0.069-0.115-0.153-0.186-0.251c-0.001-0.002-0.002-0.003-0.003-0.005
                                             c-0.149-0.207-0.336-0.476-0.544-0.8c-0.005-0.007-0.009-0.015-0.014-0.022c-0.098-0.154-0.202-0.32-0.308-0.497
                                             c-0.008-0.013-0.016-0.026-0.024-0.04c-0.226-0.379-0.466-0.808-0.705-1.283l-0.001-0.002c-0.127-0.254-0.254-0.523-0.378-0.802
                                             l0,0c-0.017-0.039-0.035-0.077-0.052-0.116h0c-0.055-0.125-0.11-0.256-0.166-0.391c-0.02-0.049-0.04-0.1-0.06-0.15
                                             c-0.052-0.131-0.105-0.263-0.161-0.414c-0.102-0.272-0.198-0.556-0.29-0.849l-0.055-0.178c-0.006-0.02-0.013-0.04-0.019-0.061
                                             c-0.094-0.316-0.184-0.639-0.26-0.971l-0.091-0.396l-0.341-0.22C26.346,24.803,26,24.176,26,23.5v-4
                                             c0-0.561,0.238-1.084,0.67-1.475L27,17.728V11.5v-0.354l-0.027-0.021c-0.034-0.722,0.009-2.935,1.623-4.776
                                             C30.253,4.458,33.081,3.5,37,3.5c3.905,0,6.727,0.951,8.386,2.828c1.947,2.201,1.625,5.017,1.623,5.041L47,17.728l0.33,0.298
                                             C47.762,18.416,48,18.939,48,19.5v4c0,0.873-0.572,1.637-1.422,1.899l-0.498,0.153l-0.16,0.495
                                             c-0.669,2.081-1.622,4.003-2.834,5.713c-0.297,0.421-0.586,0.794-0.837,1.079L42,33.123v0.38c-0.252,0.105-0.494,0.229-0.737,0.349
                                             c-0.062,0.031-0.125,0.059-0.186,0.09c-0.219,0.113-0.432,0.233-0.643,0.357c-0.111,0.065-0.22,0.132-0.328,0.199
                                             c-0.192,0.121-0.383,0.243-0.568,0.374c-0.12,0.084-0.235,0.175-0.352,0.264c-0.289,0.218-0.568,0.448-0.837,0.689
                                             c-0.129,0.116-0.26,0.229-0.385,0.35c-0.143,0.139-0.28,0.284-0.416,0.429c-0.115,0.122-0.228,0.245-0.338,0.372
                                             c-0.132,0.152-0.263,0.305-0.388,0.462c-0.103,0.13-0.199,0.264-0.297,0.397c-0.208,0.284-0.404,0.576-0.59,0.877
                                             c-0.087,0.141-0.177,0.28-0.258,0.424c-0.101,0.178-0.192,0.361-0.284,0.544c-0.075,0.148-0.147,0.297-0.217,0.449
                                             c-0.083,0.182-0.164,0.364-0.238,0.55c-0.074,0.183-0.139,0.37-0.204,0.556c-0.076,0.217-0.149,0.435-0.213,0.658
                                             c-0.08,0.276-0.153,0.554-0.215,0.836c-0.031,0.143-0.056,0.288-0.082,0.433c-0.047,0.255-0.086,0.512-0.118,0.771
                                             c-0.016,0.129-0.032,0.258-0.044,0.389C34.024,44.712,34,45.104,34,45.5c0,0.435,0.023,0.867,0.066,1.294
                                             c0.016,0.162,0.048,0.319,0.07,0.479c0.036,0.263,0.068,0.526,0.12,0.785c0.035,0.175,0.085,0.345,0.127,0.518
                                             c0.058,0.239,0.112,0.479,0.184,0.714c0.049,0.159,0.11,0.313,0.165,0.47c0.084,0.243,0.167,0.487,0.266,0.724
                                             c0.055,0.133,0.12,0.26,0.18,0.39c0.115,0.254,0.232,0.507,0.363,0.753c0.058,0.107,0.123,0.21,0.184,0.316
                                             c0.148,0.259,0.298,0.515,0.464,0.763c0.061,0.091,0.128,0.177,0.191,0.267c0.176,0.25,0.356,0.498,0.551,0.736
                                             c0.072,0.088,0.15,0.17,0.224,0.256c0.155,0.18,0.303,0.364,0.468,0.536H16z M47,56.5c-2.258,0-4.359-0.686-6.107-1.858
                                             c-0.341-0.228-0.663-0.476-0.972-0.736c-0.108-0.092-0.21-0.19-0.314-0.286c-0.197-0.179-0.388-0.363-0.57-0.554
                                             c-0.117-0.123-0.23-0.248-0.341-0.375c-0.164-0.189-0.318-0.384-0.468-0.583c-0.096-0.127-0.195-0.25-0.286-0.381
                                             c-0.221-0.321-0.429-0.651-0.615-0.993c-0.043-0.08-0.077-0.164-0.118-0.245c-0.146-0.286-0.282-0.576-0.403-0.874
                                             c-0.052-0.13-0.097-0.263-0.145-0.395c-0.094-0.262-0.18-0.528-0.255-0.797c-0.038-0.138-0.075-0.277-0.108-0.417
                                             c-0.067-0.285-0.119-0.574-0.163-0.865c-0.019-0.125-0.043-0.248-0.057-0.374C36.031,46.348,36,45.926,36,45.5
                                             c0-0.339,0.021-0.674,0.051-1.005c0.011-0.118,0.027-0.235,0.042-0.352c0.026-0.21,0.058-0.417,0.095-0.624
                                             c0.026-0.139,0.052-0.278,0.083-0.416c0.04-0.18,0.088-0.356,0.137-0.532c0.041-0.146,0.077-0.294,0.124-0.439
                                             c0.086-0.267,0.183-0.53,0.289-0.788c0.072-0.175,0.154-0.345,0.235-0.515c0.053-0.113,0.105-0.225,0.162-0.336
                                             c0.087-0.17,0.18-0.337,0.276-0.502c0.06-0.103,0.122-0.204,0.185-0.304c0.103-0.165,0.207-0.33,0.319-0.489
                                             c0.057-0.081,0.119-0.158,0.178-0.238c0.234-0.315,0.484-0.617,0.75-0.905c0.061-0.066,0.119-0.135,0.182-0.2
                                             c0.137-0.141,0.281-0.276,0.426-0.41c0.083-0.077,0.167-0.155,0.253-0.23c0.15-0.131,0.304-0.258,0.461-0.381
                                             c0.08-0.062,0.162-0.122,0.243-0.182c0.174-0.128,0.349-0.256,0.532-0.374c0.013-0.008,0.026-0.016,0.039-0.024
                                             c0.685-0.44,1.426-0.808,2.214-1.092c0.066-0.024,0.131-0.05,0.198-0.073l0.295-0.104C44.791,34.671,45.876,34.5,47,34.5
                                             c6.065,0,11,4.935,11,11S53.065,56.5,47,56.5z"/>
                                       </g>
                                    </svg>
                                    <span class="num two">
                                       <small>2</small>
                                    </span>
                                 </span>
                            </div>
                            <div class="employ-icon-text">
                                <a href="javascript:;">
                                    <h4>Specify & Search Your Job</h4>
                                </a>
                                <p>Browse profile, reviews and proposals then interview top candidates.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="employ-text-box">
                            <div class="employ-icon apply-job">
                                 <span>
                                    <svg version="1.1" id="Layer_23" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 511.763 511.763"
                                         style="enable-background:new 0 0 511.763 511.763;" xml:space="preserve">
                                       <g>
                                          <g>
                                             <path d="M511.716,9.802c-0.107-0.853-0.213-1.707-0.533-2.56c-0.107-0.32-0.213-0.747-0.32-1.067
                                                c-0.533-1.173-1.28-2.24-2.133-3.2c-0.96-0.853-2.027-1.6-3.2-2.133c-0.32-0.107-0.747-0.32-1.067-0.32
                                                c-0.853-0.213-1.707-0.427-2.56-0.427c-0.427,0-0.747,0-1.173,0c-0.96,0-2.027,0.213-2.987,0.533
                                                c-0.213,0.107-0.427,0.107-0.64,0.213h-0.107L6.436,213.962c-5.44,2.347-7.893,8.64-5.547,14.08c0.96,2.24,2.667,4.053,4.8,5.12
                                                l178.347,94.4l94.507,178.347c1.813,3.52,5.44,5.653,9.387,5.76h0.427c4.053-0.107,7.68-2.667,9.387-6.4L510.969,14.815v-0.107
                                                c0.107-0.213,0.107-0.427,0.213-0.64c0.32-0.96,0.533-1.92,0.533-2.987C511.716,10.655,511.822,10.228,511.716,9.802z
                                                M35.342,224.522l418.88-182.08l-264.107,264L35.342,224.522z M287.182,476.362l-81.92-154.773l264-264.107L287.182,476.362z"/>
                                          </g>
                                       </g>
                                    </svg>
                                    <span class="num three">
                                       <small>3</small>
                                    </span>
                                 </span>
                            </div>
                            <div class="employ-icon-text">
{{--                                <a href="{{route('/register')}}">--}}
                                    <h4>Register an Account</h4>
                                </a>
                                <p>Use the upwork platform to chat, share files, and collaborate from your desktop or on the
                                    go.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="right-jobs-wrapper float_left pb-100">
        <div class="container">
            <div class="home1-section-heading1">
                <h6>Millions of Jobs </h6>
                <h4>Find the one that’s Right for you</h4>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <a href="{{asset('/website/javascript:;')}}">
                        <div class="project-wrapper float_left">
                            <div class="project-icon">
                              <span><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
  <g>
    <g>
      <path d="m100.1,106.2c2.3,0 4.1-1.8 4.1-4.1v-8.4c0-8.2-3.3-15.9-9.2-21.5 0.4-2.6 0.7-5.2 0.7-7.7 1.42109e-14-28.5-27.1-56-28.3-57.1-0.8-0.8-1.8-1.2-2.9-1.2-1.1,0-2.1,0.4-2.9,1.2-1.1,1.2-28.1,28.7-28.1,57.1 0,2.5 0.2,5 0.6,7.5-5.9,5.7-9.3,13.4-9.3,21.7v8.4c0,2.3 1.8,4.1 4.1,4.1s4.1-1.8 4.1-4.1v-8.4c0-4.3 1.3-8.4 3.5-11.9 1.2,3.7 2.9,7.6 4.9,11.5 0.7,1.4 2.1,2.2 3.7,2.2h15.4v6.6c0,2.3 1.8,4.1 4.1,4.1 2.3,0 4.1-1.8 4.1-4.1v-6.6h15.5c1.5,0 2.9-0.9 3.7-2.2 2-3.8 3.6-7.6 4.8-11.3 2.2,3.5 3.4,7.5 3.4,11.7v8.4c-0.1,2.2 1.7,4.1 4,4.1zm-18.5-18.9h-13v-6.6c0-2.3-1.8-4.1-4.1-4.1-2.3,0-4.1,1.8-4.1,4.1v6.6h-12.8c-2.3-4.9-4-9.7-4.9-14.1 0-0.3-0.1-0.6-0.2-0.9-0.5-2.7-0.8-5.3-0.8-7.8 0-19.8 16.1-40.4 22.8-48.1 6.8,7.7 23,28.2 23,48.1 0,6.9-2,14.6-5.9,22.8z"/>
      <path d="m49.9,52.9c0,8.1 6.6,14.8 14.8,14.8s14.8-6.6 14.8-14.8-6.6-14.8-14.8-14.8-14.8,6.7-14.8,14.8zm14.8-6.5c3.6,0 6.6,2.9 6.6,6.6s-2.9,6.6-6.6,6.6c-3.6,0-6.6-2.9-6.6-6.6s3-6.6 6.6-6.6z"/>
      <path d="m45.9,118.7v-13.7c0-2.3-1.8-4.1-4.1-4.1-2.3,0-4.1,1.8-4.1,4.1v13.7c0,2.3 1.8,4.1 4.1,4.1 2.3,0 4.1-1.8 4.1-4.1z"/>
      <path d="m91.3,118.7v-13.7c0-2.3-1.8-4.1-4.1-4.1-2.3,0-4.1,1.8-4.1,4.1v13.7c0,2.3 1.8,4.1 4.1,4.1 2.2,0 4.1-1.8 4.1-4.1z"/>
    </g>
  </g>
</svg></span>
                            </div>
                            <div class="project-text">
                                <h4>2,500</h4>
                                <p>Projects</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <a href="javascript:;">
                        <div class="project-wrapper float_left">
                            <div class="project-icon">
                            <span><svg id="Layer_21" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                       viewBox="0 0 24 24"><title>Maps, GPS</title><path
                                        d="M15.92,15.23,18.35,11a7.27,7.27,0,0,0,0-7.35,7.35,7.35,0,0,0-12.72,0,7.27,7.27,0,0,0,0,7.35l2.43,4.21C4,15.71,0,17,0,19.5,0,22.59,6.22,24,12,24s12-1.41,12-4.5C24,17,20,15.71,15.92,15.23ZM7.37,4.67A5.34,5.34,0,1,1,16.62,10L12,18,7.38,10A5.31,5.31,0,0,1,7.37,4.67ZM12,22C5.4,22,2,20.25,2,19.5c0-.53,2.15-1.95,7.18-2.38l1.35,2.33a1.7,1.7,0,0,0,2.94,0l1.35-2.33C19.85,17.55,22,19,22,19.5,22,20.25,18.6,22,12,22Z"/><circle
                                        cx="12" cy="7" r="2"/></svg></span>
                            </div>
                            <div class="project-text">
                                <h4>1,200</h4>
                                <p>Companies</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <a href="javascript:;">
                        <div class="project-wrapper float_left">
                            <div class="project-icon">
                              <span><svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M34.2 31.5099C36.4092 29.8547 38.0414 27.5462 38.8655 24.9116C39.6895 22.2769 39.6635 19.4498 38.7912 16.8307C37.9189 14.2117 36.2444 11.9336 34.0052 10.3193C31.766 8.70491 29.0755 7.83618 26.315 7.83618C23.5545 7.83618 20.864 8.70491 18.6248 10.3193C16.3856 11.9336 14.7111 14.2117 13.8388 16.8307C12.9665 19.4498 12.9405 22.2769 13.7645 24.9116C14.5886 27.5462 16.2208 29.8547 18.43 31.5099C13.6381 33.1597 9.4801 36.2629 6.53511 40.3874C3.59012 44.5118 2.00481 49.452 2 54.5199C2 56.7199 2.25 59.8199 4.44 61.2699C6.92 62.8999 10.07 61.5599 14.06 59.8499C17.53 58.3699 21.86 56.5199 26.32 56.5199C30.78 56.5199 35.11 58.3699 38.59 59.8499C41.31 61.0099 43.59 62.0099 45.59 62.0099C46.5049 62.0289 47.4042 61.771 48.17 61.2699C50.36 59.8199 50.62 56.7199 50.62 54.5199C50.6144 49.4536 49.03 44.5149 46.0871 40.3909C43.1442 36.2669 38.9892 33.1627 34.2 31.5099V31.5099ZM26.31 11.8699C28.1205 11.8699 29.8904 12.4071 31.3955 13.4134C32.9007 14.4197 34.0734 15.8499 34.7654 17.523C35.4573 19.1961 35.6374 21.0369 35.2827 22.8124C34.928 24.5878 34.0546 26.2182 32.7729 27.497C31.4913 28.7759 29.859 29.6458 28.0828 29.9965C26.3065 30.3473 24.4662 30.1633 22.7946 29.4677C21.123 28.7721 19.6953 27.5962 18.6923 26.0888C17.6893 24.5815 17.156 22.8105 17.16 20.9999C17.1679 18.5775 18.1351 16.2568 19.8499 14.5457C21.5648 12.8347 23.8875 11.8726 26.31 11.8699V11.8699ZM46 57.9299C45.32 58.3799 42.22 57.0499 40.16 56.1799C36.35 54.5499 31.61 52.5199 26.32 52.5199C21.03 52.5199 16.32 54.5199 12.48 56.1799C10.43 57.0499 7.33 58.3799 6.65 57.9299C6.65 57.9299 6 57.4699 6 54.5199C6.11784 49.2075 8.31098 44.1523 12.1098 40.4368C15.9087 36.7213 21.0112 34.6408 26.325 34.6408C31.6388 34.6408 36.7413 36.7213 40.5402 40.4368C44.339 44.1523 46.5322 49.2075 46.65 54.5199C46.65 57.4699 46 57.9299 46 57.9299Z"/>
<path d="M61.4099 4.61001C61.2242 4.42406 61.0036 4.27654 60.7608 4.17589C60.518 4.07524 60.2578 4.02344 59.9949 4.02344C59.7321 4.02344 59.4718 4.07524 59.229 4.17589C58.9862 4.27654 58.7657 4.42406 58.5799 4.61001L48.7199 14.52L44.1899 9.52001C43.8359 9.12219 43.3383 8.88131 42.8066 8.85036C42.2749 8.81942 41.7528 9.00095 41.3549 9.35501C40.9571 9.70907 40.7162 10.2067 40.6853 10.7383C40.6543 11.27 40.8359 11.7922 41.1899 12.19L47.1299 18.79C47.5034 19.1922 48.0214 19.4296 48.5699 19.45V19.45C49.0995 19.4478 49.6066 19.2356 49.9799 18.86L61.4199 7.44001C61.6052 7.25361 61.752 7.03251 61.8518 6.78936C61.9515 6.54621 62.0024 6.28577 62.0015 6.02294C62.0006 5.76011 61.9479 5.50004 61.8463 5.2576C61.7448 5.01515 61.5965 4.7951 61.4099 4.61001V4.61001Z"/>
</svg>
</span>
                            </div>
                            <div class="project-text">
                                <h4>1,500</h4>
                                <p>Profiles</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <a href="javascript:;">
                        <div class="project-wrapper float_left">
                            <div class="project-icon">
                            <span><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/><g id="User"><path
                                            d="M21,30H11a5,5,0,0,1-5-5V24a9,9,0,0,1,9-9h2a9,9,0,0,1,9,9v1A5,5,0,0,1,21,30ZM15,17a7,7,0,0,0-7,7v1a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V24a7,7,0,0,0-7-7Z"/><path
                                            d="M16,14a6,6,0,1,1,6-6A6,6,0,0,1,16,14ZM16,4a4,4,0,1,0,4,4A4,4,0,0,0,16,4Z"/></g></svg></span>
                            </div>
                            <div class="project-text">
                                <h4>1,950</h4>
                                <p>Users</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="post-latest-job-wrapper float_left ptb-100">
        <div class="container">
            <div class="home1-section-heading1">
                <h6>Our Blog</h6>
                <h4>Our Latest Post</h4>
            </div>
            <div class="latest-post-main-box float_left">
                <div class="row">
                    @if($posts->isNotEmpty())
                        @foreach($posts->take(2) as $post)
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="post-picture float_left mb-4">
                                    <img src="{{ asset($post->photo) }}" alt="img">

                                    <span>{{ $post->created_at->format('d M Y') }}</span>
                                    <h4>
                                        <a href="{{ route('guest.posts.show', $post->id) }}">{{ $post->title }}</a>
                                    </h4>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> &nbsp;
                                                {{ $post->is_liked ? 'Liked' : 'Like' }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-comments-o" aria-hidden="true"></i> &nbsp;
                                                {{ $post->comments->count() }} Comments
                                            </a>
                                        </li>
                                    </ul>

                                    @foreach($post->comments as $comment)
                                        <div class="comment-box mt-2">
                                            <p><strong>{{ $comment->user->name ?? 'Guest' }}</strong></p>
                                            <p>{{ $comment->content }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No posts available.</p>
                    @endif
                </div>

                <div class="center-btn float_left mt-5">
                    <a href="{{ route('guest.posts.index') }}">
                        <span>Read More</span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="client-say-wrapper float_left ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="home1-section-heading1">
                        <h6>Testimonial</h6>
                        <h4>Our Client’s Say</h4>
                    </div>
                    <div class="heading-text mt-4">
                        <p>It is a long established fact that a reader
                            will be distracted by the readable content
                            of a page when looking at its layout.</p>
                        <a class="custom-btn" href="javascript:;"> <span>Read More</span> </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="client-post-wrapper">
                        <div class="left-side-client">
                            <div class="left-side-one">
                                <span> <img src="{{asset('website/images/index2/testi1.png')}}" alt="img"> </span>
                                <a href="javascript:;"><h5>Minakili Doe <small> (CEO) </small></h5></a>
                                <p>It is a long established fact that a reader will be distracted by the readable content of
                                    a page when looking at its layout.</p>
                            </div>
                            <div class="left-side-one">
                                <span> <img src="{{asset('website/images/index2/testi2.png')}}" alt="img"> </span>
                                <a href="javascript:;"><h5>Renato Lee <small> (CEO) </small></h5></a>
                                <p>It is a long established fact that a reader will be distracted by the readable content of
                                    a page when looking at its layout.</p>
                            </div>
                        </div>
                        <!--  -->
                        <div class="right-side-client">
                            <div class="right-side-one">
                                <span> <img src="{{asset('website/images/index2/testi3.png')}}" alt="img"> </span>
                                <a href="javascript:;"><h5>Geason Doe <small> (CEO) </small></h5></a>
                                <p>It is a long established fact that a reader will be distracted by the readable content of
                                    a page when looking at its layout.</p>
                            </div>
                            <div class="right-side-one">
                                <span> <img src="{{asset('website/images/index2/testi4.png')}}" alt="img"> </span>
                                <a href="javascript:;"><h5>Watson Doe <small> (CEO) </small></h5></a>
                                <p>It is a long established fact that a reader will be distracted by the readable content of
                                    a page when looking at its layout.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest.layouts.app>
