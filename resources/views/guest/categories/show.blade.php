<x-guest.layouts.app :categories="$categories">
    <div class="container py-5">
        <h2 class="mb-4">Jobs in: {{ $category->name }}</h2>

        @if($jobs->isEmpty())
            <p>No jobs found in this category.</p>
        @else
            <div class="row">
                @foreach($jobs as $job)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $job->title }}</h5>
                                <p class="card-text">{{ Str::limit($job->description, 100) }}</p>
                                <a href="{{ route('guest.jobs.show', $job->id) }}" class="btn btn-primary btn-sm">View Job</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-guest.layouts.app>
