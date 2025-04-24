<x-app-layout>
    <div class="max-w-4xl mx-auto p-8">
        <x-slot name="header">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('Create Job') }}
            </h2>
        </x-slot>

        <form action="{{ route('admin.jobs.store') }}" method="POST" class="mt-8 space-y-6 bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8">
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                       class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('title') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
                @error('description') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Salary --}}
            <div>
                <label for="salary" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Salary</label>
                <input type="text" id="salary" name="salary" value="{{ old('salary') }}"
                       class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('salary') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Start and Expiration Dates --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}"
                           class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('start_date') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="expiration_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Expiration Date</label>
                    <input type="date" id="expiration_date" name="expiration_date" value="{{ old('expiration_date') }}"
                           class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('expiration_date') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Gender --}}
            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gender</label>
                <select id="gender" name="gender"
                        class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach(App\Gender::cases() as $gender)
                        <option value="{{ $gender->value }}" {{ old('gender') == $gender->value ? 'selected' : '' }}>
                            {{ $gender->label() }}
                        </option>
                    @endforeach
                </select>
                @error('gender') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Qualification --}}
            <div>
                <label for="qualification" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Qualification</label>
                <select id="qualification" name="qualification"
                        class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach(App\Qualification::cases() as $qualification)
                        <option value="{{ $qualification->value }}" {{ old('qualification') == $qualification->value ? 'selected' : '' }}>
                            {{ $qualification->label() }}
                        </option>
                    @endforeach
                </select>
                @error('qualification') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            {{--status--}}
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                <select id="qualification" name="qualification"
                        class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach(App\JobStatus::cases() as $jobStatus)
                        <option value="{{ $jobStatus->value }}" {{ old('status', $job->status) == $jobStatus->value ? 'selected' : '' }}>
                            {{ $jobStatus->label() }}
                        </option>
                    @endforeach
                </select>
                @error('status') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Career Level --}}
            <div>
                <label for="career_level_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Career Level</label>
                <select id="career_level_id" name="career_level_id"
                        class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Career Level</option>
                    @foreach($tag_careers as $tag)
                        <option value="{{ $tag->id }}" {{ old('career_level') == $tag->id ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                @error('career_level_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            {{-- Employment type --}}
            <div>
                <label for="employment_type_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Employment type</label>
                <select id="employment_type_id" name="employment_type_id"
                        class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select Employment typel</option>
                    @foreach($tag_employment_types as $emp)
                        <option value="{{ $emp->id }}" {{ old('career_level') == $emp->id ? 'selected' : '' }}>
                            {{ $emp->name }}
                        </option>
                    @endforeach
                </select>
                @error('employment_type_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Job Type --}}
            <div>
                <label for="job_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Job Type</label>
                <input type="text" id="job_type" name="job_type" value="{{ old('job_type') }}"
                       class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('job_type') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Is Featured --}}
            <div class="flex items-center">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                <label class="ml-2 text-sm text-gray-700 dark:text-gray-300">Is Featured?</label>
                @error('is_featured') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>

            {{-- Textareas --}}
            @php
                $textareas = ['responsibility', 'skill_experience', 'experience'];
            @endphp

            @foreach($textareas as $name)
                <div>
                    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ ucwords(str_replace('_', ' ', $name)) }}</label>
                    <textarea id="{{ $name }}" name="{{ $name }}[]" rows="3"
                              class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old("$name.0") }}</textarea>
                    @error($name) <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
            @endforeach


            {{-- Tags --}}
            <div>
                <label for="tag_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tags</label>
                <select id="tag_id" name="tag_id[]" multiple
                        class="w-full mt-1 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tag_id', [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
                @error('tag_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            {{-- Submit --}}
            <div>
                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-xl text-lg font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Job
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
