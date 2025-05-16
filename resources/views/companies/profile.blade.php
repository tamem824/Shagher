<x-guest.layouts.app :categories="$categories">
    <div class="container py-5">

        {{-- Company Info --}}
        <div class="card mb-5 shadow border-0">
            <div class="card-body d-flex flex-column flex-md-row align-items-center">
                <div class="me-md-4 mb-3 mb-md-0 text-center">
                    <img
                        src="{{ $company->photo ? asset('storage/' . $company->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($company->name) }}"
                        alt="Company Logo"
                        class="rounded-circle border"
                        width="120"
                        height="120">
                </div>
                <div class="w-100 position-relative">
                    <a href="{{ route('company.profile.edit') }}"
                       class="btn btn-sm btn-pink position-absolute top-0 end-0">
                        <i class="bi bi-pencil"></i> Edit Profile
                    </a>

                    <h3 class="mb-1">{{ $company->name }}</h3>
                    <p class="text-muted mb-2">{{ $company->email }}</p>

                    @if($company->description)
                        <p class="mb-2">{{ $company->description }}</p>
                    @endif

                    @if($company->address)
                        <p class="text-muted mb-0">
                            <i class="bi bi-geo-alt-fill me-1"></i> {{ $company->address }}
                        </p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Jobs --}}
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">My Jobs ({{ $company->jobs->count() }})</h4>
            <a href="{{ route('guest.jobs.create') }}" class="btn btn-pink btn-sm">
                <i class="bi bi-plus-circle me-1"></i> Post New Job
            </a>
        </div>

        @if($company->jobs->count())
            <div class="row">
                @foreach($company->jobs as $job)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $job->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($job->description, 80) }}</p>
                                <small class="text-muted d-block mb-3">Posted on {{ $job->created_at->format('M d, Y') }}</small>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('guest.jobs.show', $job) }}" class="btn btn-sm btn-outline-pink">View</a>
                                    <a href="{{ route('company.jobs.edit', $job) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-muted py-5">
                <p class="mb-3">You haven’t posted any jobs yet.</p>
                <a href="{{ route('guest.jobs.create') }}" class="btn btn-pink">
                    <i class="bi bi-plus-circle me-1"></i> Post Your First Job
                </a>
            </div>
        @endif
    </div>

    {{-- Custom styles --}}
    <style>
        .btn-pink {
            background-color: #ff69b4;
            color: white;
        }

        .btn-pink:hover {
            background-color: #ff85c1;
            color: white;
        }

        .btn-outline-pink {
            border-color: #ff69b4;
            color: #ff69b4;
        }

        .btn-outline-pink:hover {
            background-color: #ff69b4;
            color: white;
        }
    </style>
</x-guest.layouts.app>
