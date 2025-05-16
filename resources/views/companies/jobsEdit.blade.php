<x-guest.layouts.app :categories="$categories">
    <div class="container py-5" style="max-width: 700px;">
        <div class="d-flex justify-content-start mb-4">
            <a href="{{ route('company.profile.edit') }}" class="btn btn-pink">
                <i class="bi bi-pencil"></i> Edit Profile
            </a>
        </div>

        <div class="card shadow-sm border-0" style="border-radius: 1rem; background-color: #f8e1f4;">
            <div class="card-body">
                <h2 class="card-title mb-4 text-center" style="color: #b83280;">Edit Job</h2>

                <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Job Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $job->title) }}" class="form-control" required>
                        @error('title') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" rows="4" class="form-control" required>{{ old('description', $job->description) }}</textarea>
                        @error('description') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="text" id="salary" name="salary" value="{{ old('salary', $job->salary) }}" class="form-control" required>
                        @error('salary') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $job->start_date) }}" class="form-control" required>
                            @error('start_date') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="expiration_date" class="form-label">Expiration Date</label>
                            <input type="date" id="expiration_date" name="expiration_date" value="{{ old('expiration_date', $job->expiration_date) }}" class="form-control" required>
                            @error('expiration_date') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" name="gender" class="form-select" required>
                            @foreach(App\Gender::cases() as $gender)
                                <option value="{{ $gender->value }}" {{ old('gender', $job->gender) == $gender->value ? 'selected' : '' }}>
                                    {{ $gender->label() }}
                                </option>
                            @endforeach
                        </select>
                        @error('gender') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="qualification" class="form-label">Qualification</label>
                        <select id="qualification" name="qualification" class="form-select" required>
                            @foreach(App\Qualification::cases() as $qualification)
                                <option value="{{ $qualification->value }}" {{ old('qualification', $job->qualification) == $qualification->value ? 'selected' : '' }}>
                                    {{ $qualification->label() }}
                                </option>
                            @endforeach
                        </select>
                        @error('qualification') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select" required>
                            @foreach(App\JobStatus::cases() as $jobStatus)
                                <option value="{{ $jobStatus->value }}" {{ old('status', $job->status) == $jobStatus->value ? 'selected' : '' }}>
                                    {{ $jobStatus->label() }}
                                </option>
                            @endforeach
                        </select>
                        @error('status') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="career_level_id" class="form-label">Career Level</label>
                        <select id="career_level_id" name="career_level_id" class="form-select" required>
                            <option value="">Select Career Level</option>
                            @foreach($tag_careers as $tag)
                                <option value="{{ $tag->id }}" {{ old('career_level_id', $job->career_level_id) == $tag->id ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('career_level_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="employment_type_id" class="form-label">Employment Type</label>
                        <select id="employment_type_id" name="employment_type_id" class="form-select">
                            <option value="">Select Employment Type</option>
                            @foreach($tag_employment_types as $emp)
                                <option value="{{ $emp->id }}" {{ old('employment_type_id', $job->employment_type_id) == $emp->id ? 'selected' : '' }}>
                                    {{ $emp->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('employment_type_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="job_type" class="form-label">Job Type</label>
                        <input type="text" id="job_type" name="job_type" value="{{ old('job_type', $job->job_type) }}" class="form-control" required>
                        @error('job_type') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input type="hidden" name="is_featured" value="0">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $job->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Is Featured?</label>
                        @error('is_featured') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    @php
                        $textareas = ['responsibility', 'skill_experience', 'experience'];
                    @endphp
                    @foreach($textareas as $name)
                        <div class="mb-3">
                            <label for="{{ $name }}" class="form-label">{{ ucwords(str_replace('_', ' ', $name)) }}</label>
                            <textarea id="{{ $name }}" name="{{ $name }}[]" rows="3" class="form-control">{{ old("$name.0", is_array($job->$name) ? implode("\n", $job->$name) : $job->$name) }}</textarea>
                            @error($name) <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                    @endforeach

                    <div class="mb-3">
                        <label for="tag_id" class="form-label">Tags</label>
                        <select id="tag_id" name="tag_id[]" class="form-select" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tag_id', $job->tags->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('tag_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-pink w-100 py-2 fw-bold">
                        Update Job
                    </button>
                </form>
            </div>
        </div>
    </div>
    <style>
        .btn-pink {
            background-color: #b83280;
            color: white;
            border: none;
        }
        .btn-pink:hover {
            background-color: #9b2565;
            color: white;
        }
    </style>

</x-guest.layouts.app>
