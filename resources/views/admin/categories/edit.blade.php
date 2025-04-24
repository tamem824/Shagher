<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Success Message --}}
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

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
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block font-medium text-gray-700 dark:text-gray-300">Name:</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                               class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label for="description" class="block font-medium text-gray-700 dark:text-gray-300">Description:</label>
                        <textarea name="description" id="description" required rows="4"
                                  class="w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <div>
                        <label for="image" class="block font-medium text-gray-700 dark:text-gray-300">Image:</label>
                        <input type="file" name="image" id="image" class="mt-1 dark:text-white">
                    </div>

                    <div>
                        <p class="font-medium text-gray-700 dark:text-gray-300 mb-2">Current Image:</p>
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                             class="w-32 h-32 object-cover rounded border">
                    </div>

                    <div>
                        <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Update Category
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
