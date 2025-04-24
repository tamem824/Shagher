<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form --}}
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block font-medium text-gray-700 dark:text-gray-300">Name:</label>
                        <input type="text" name="name" id="name" required
                               class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label for="description" class="block font-medium text-gray-700 dark:text-gray-300">Description:</label>
                        <textarea name="description" id="description" required rows="4"
                                  class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white"></textarea>
                    </div>

                    <div>
                        <label for="image" class="block font-medium text-gray-700 dark:text-gray-300">Image:</label>
                        <input type="file" name="image" id="image" class="mt-1 dark:text-white">
                    </div>

                    <div>
                        <button type="submit"
                                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                            Create Category
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
