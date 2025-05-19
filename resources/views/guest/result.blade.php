<x-guest.layouts.app :categories="$categories">
    <div class="index1-listing-slider-wrapper float_left">
        <div class="container">
            <div class="slider-text text-center">
                <h4>Available jobs</h4>
                <ul>
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li>Available jobs</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- banner section start end-->
    <!-- inner page -->

    <!-- resources/views/projects/index.blade.php -->

    <div class="inner-page-main-wrapper float_left">
        <div class="container">
            <div class="home1-section-heading1 mb-4">
                <h6>Project Listing</h6>
            </div>

            <div class="row">
                @foreach($jobs as $job)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="ewr_search_infobox">
                            <div class="ewr_search_proj w-100">
                                <h4>
                                    <a href="{{ route('jobs.show', $job->id) }}">
                                        {{ $job->title }}
                                    </a>
                                </h4>
                                <h5>
                                    <i class="fa fa-check-square"></i>
                                    {{ $job->company->name ?? 'Google' }}
                                </h5>
                                <p>{{ Str::limit($job->description, 40) }}</p>

                                <ul class="ewr_profile_tag">
                                    @foreach($job->skill_experience as $skill)
                                        <li><a href="javascript:;">{{ $skill }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="ewr_search_proj_list w-100">
                                <div class="ewr_search_proj_info list-column pt-0">
                                    <ul>
                                        <li class="doller w-30">
                                            <i class="fa fa-dollar"></i> {{ $job->salary }}
                                        </li>
                                        <li>

                                            {{ $job->location->country ?? 'Unknown' }}
                                        </li>
                                        <li class="folder">
                                            <i class="fa fa-folder"></i> Type: {{ $job->job_type }}
                                        </li>
                                        <li class="folder">
                                            <i class="fa fa-clock-o"></i>
                                            Start: {{ \Carbon\Carbon::parse($job->start_date)->format('M d, Y') }}
                                        </li>
                                        <li class="folder">
                                            <i class="fa fa-money"></i>
                                            Expires: {{ \Carbon\Carbon::parse($job->expiration_date)->format('M d, Y') }}
                                        </li>
                                        <li class="folder">
                                            <a href="javascript:;"><i class="fa fa-heart"></i> Favorite</a>
                                        </li>
                                    </ul>

                                    <a href="{{ route('jobs.show', $job->id) }}" class="ewr_btn_yellow">
                                        <span>Bid Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="row mt-1">
                <div class="col-12 d-flex justify-content-center">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>

    </div>


    <!-- modal apply now -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>

</x-guest.layouts.app>
