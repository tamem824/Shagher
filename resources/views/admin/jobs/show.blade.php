<x-app-layout>
    <div class="max-w-4xl mx-auto p-8">
        <x-slot name="header">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('Job Details') }}
            </h2>
        </x-slot>

        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8">
            <div class="space-y-6">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $job->title }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $job->description }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Salary:</strong>
                        <p class="text-gray-600 dark:text-gray-400">{{ $job->salary }}</p>
                    </div>

                    <div>
                        <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Start Date:</strong>
                        <p class="text-gray-600 dark:text-gray-400">{{ $job->start_date }}</p>
                    </div>

                    <div>
                        <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Expiration Date:</strong>
                        <p class="text-gray-600 dark:text-gray-400">{{ $job->expiration_date }}</p>
                    </div>


                    <div>
                        <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Gender:</strong>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ $job->gender ? $job->gender->label() : 'Not specified' }}
                        </p>
                    </div>
                    <div>
                        <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Career Level:</strong>
                        <p class="text-gray-600 dark:text-gray-400">{{ $job->career_level->name }}</p>
                    </div>

                    <div>
                        <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Employment Type:</strong>
                        <p class="text-gray-600 dark:text-gray-400">{{ $job->employment_type->name ?? 'Not specified' }}</p>
                    </div>

                    <div>
                        <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Job Type:</strong>
                        <p class="text-gray-600 dark:text-gray-400">{{ $job->job_type }}</p>
                    </div>

                    <div>
                        <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Is Featured:</strong>
                        <p class="text-gray-600 dark:text-gray-400">{{ $job->is_featured ? 'Yes' : 'No' }}</p>
                    </div>

                    <div>
                        <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Status:</strong>
                        <p class="text-gray-600 dark:text-gray-400">{{ App\JobStatus::from($job->status)->label() }}</p>
                    </div>
                </div>

                <div>
                    <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Responsibilities:</strong>
                    <ul class="list-disc pl-5 text-gray-600 dark:text-gray-400">
                        @foreach(($job->responsibility) as $responsibility)
                            <li>{{ $responsibility }}</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Skills & Experience:</strong>
                    <ul class="list-disc pl-5 text-gray-600 dark:text-gray-400">
                        @foreach(($job->skill_experience) as $skill)
                            <li>{{ $skill }}</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Experience:</strong>
                    <ul class="list-disc pl-5 text-gray-600 dark:text-gray-400">
                        @foreach(($job->experience) as $exp)
                            <li>{{ $exp }}</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Tags:</strong>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach($job->tags as $tag)
                            <span class="inline-block bg-indigo-100 text-indigo-800 text-sm font-medium py-1 px-3 rounded-full">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
