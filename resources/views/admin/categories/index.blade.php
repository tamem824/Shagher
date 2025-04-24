<x-app-layout>
    <div class="container mx-auto p-4">
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block">Create</a>

        <table id="categoriesTable" class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 text-left">Name</th>
                <th class="py-2 px-4 text-left">Description</th>
                <th class="py-2 px-4 text-left">Image</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $category->name }}</td>
                    <td class="py-2 px-4">{{ Str::words($category->description, 2, '...') }}</td>
                    <td class="py-2 px-4">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-24 h-24 object-cover">
                    </td>
                    <td class="py-2 px-4 flex space-x-3">
                        <a href="{{ route('admin.categories.show', $category->id) }}" class="text-green-500 hover:text-green-700">Show</a>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
