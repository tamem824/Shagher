<x-guest.layouts.app :categories="$categories">
    <div class="container py-5">
        <div class="card mb-5 shadow border-0">
            <div class="card-body d-flex flex-column flex-md-row align-items-center">
                {{-- صورة المستخدم --}}
                <div class="me-md-4 mb-3 mb-md-0 text-center">
                    <img
                        src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                        alt="{{ __('avatar') }} {{ auth()->user()->name }}"
                        class="rounded-circle border"
                        width="120"
                        height="120">
                </div>

                {{-- User Data--}}
                <div class="w-100 position-relative">
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-pink position-absolute top-0 {{ app()->getLocale() === 'ar' ? 'start-0' : 'end-0' }}">
                        <i class="bi bi-pencil"></i> {{ __('Edit Profile') }}
                    </a>

                    <h3 class="mb-1">{{ auth()->user()->name }}</h3>
                    <p class="text-muted mb-2">{{ auth()->user()->email }}</p>

                    @if(auth()->user()->address)
                        <p class="text-muted mb-2">
                            <i class="bi bi-geo-alt-fill me-1"></i> {{ auth()->user()->address }}
                        </p>
                    @endif

                    {{-- Freelancer Data--}}
                    @if($freelancer)
                        <div class="freelancer-info">
                            <p><strong>{{ __('Skills') }}:</strong>
                                @if($freelancer->skills && $freelancer->skills->isNotEmpty())
                                    {{ $freelancer->skills->pluck('name')->implode(', ') }}
                                @else
                                    {{ __('unselected') }}
                                @endif
                            </p>
                            <p><strong>{{ __('Career Level ') }}:</strong>
                                {{ $freelancer->careerLevel->name ?? __('unselected') }}
                            </p>
                            <p><strong>{{ __('Experience') }}:</strong>
                                {{ $freelancer->experience ?? 0 }} {{ __('Year') }}
                            </p>
                        </div>
                    @else
                        <p class="text-muted">{{ __('let`s start as Freelancer') }}</p>
                        <a href="{{ route('user.freelancer.create') }}" class="btn btn-pink btn-sm">
                            {{ __('Create Freelancer Account') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>


{{--        <div class="mb-4">--}}
{{--            <h4>{{ __('الوظائف المقدم عليها') }} ({{ $appliedJobs->count() }})</h4>--}}

{{--            @if($appliedJobs->isNotEmpty())--}}
{{--                <ul class="list-group">--}}
{{--                    @foreach($appliedJobs as $application)--}}
{{--                        <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                            <a href="{{ route('jobs.show', $application->job) }}">{{ $application->job->title }}</a>--}}
{{--                            <span class="badge bg-info text-dark">{{ ucfirst($application->status) }}</span>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            @else--}}
{{--                <p class="text-muted">{{ __('لم تتقدم لأي وظائف بعد.') }}</p>--}}
{{--            @endif--}}
{{--        </div>--}}
    </div>

    <style>
        .btn-pink {
            background-color: #ff69b4;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-pink:hover {
            background-color: #ff85c1;
            color: #000000;
        }

        .badge.bg-info {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .freelancer-info p {
            margin-bottom: 0.5rem;
        }

        .card {
            border-radius: 10px;
        }
    </style>
</x-guest.layouts.app>
