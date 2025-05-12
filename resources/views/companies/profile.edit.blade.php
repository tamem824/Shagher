<x-guest.layouts.app :categories="$categories">
    <div class="container py-5">

        {{-- Company Info --}}
        <div class="card mb-5 shadow">
            <div class="card-body d-flex align-items-center">
                <img
                    src="{{ $company->photo
                        ? asset('storage/' . $company->photo)
                        : 'https://ui-avatars.com/api/?name=' . urlencode($company->name) }}"
                    alt="Company Logo"
                    class="rounded-circle me-4 border"
                    width="100"
                    height="100">
                <div>
                    <h2 class="mb-1">{{ $company->name }}</h2>
                    <p class="text-muted mb-2">{{ $company->email }}</p>
                    @if($company->description)
                        <p>{{ $company->description }}</p>
                    @endif
                    @if($company->address)
                        <p class="text-muted mb-0"><i class="bi bi-geo-alt"></i> {{ $company->address }}</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Jobs --}}
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">My Jobs</h4>
                <a href="{{ route('guest.jobs.create') }}" class="btn btn-light btn-sm">Post New Job</a>
            </div>

            @if($company->jobs->count())
                <ul class="list-group list-group-flush">
                    @foreach($company->jobs as $job)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between flex-wrap gap-2">
                                <div>
                                    <h5 class="mb-1">{{ $job->title }}</h5>
                                    <p class="text-muted mb-1">{{ Str::limit($job->description, 100) }}</p>
                                    <small class="text-muted">Posted on {{ $job->created_at->format('M d, Y') }}</small>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('company.jobs.show', $job) }}"
                                       class="btn btn-sm btn-outline-primary">View</a>
                                    <a href="{{ route('company.jobs.edit', $job) }}"
                                       class="btn btn-sm btn-outline-secondary">Edit</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="card-body text-center text-muted">
                    You have not posted any jobs yet.
                </div>
            @endif
        </div>

    </div>
</x-guest.layouts.app>
