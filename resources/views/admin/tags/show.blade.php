<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tag Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                    {{ $tag->name }}
                </h3>


                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.tags.edit', $tag->id) }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Edit
                    </a>

                    <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this tag?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>

                <div class="mt-8">
                    <a href="{{ route('admin.tags.index') }}"
                       class="text-blue-600 hover:underline">
                        ← Back to Tags
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
