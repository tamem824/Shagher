<x-app-layout>
    <div class="container mx-auto p-4">
        <a href="{{ route('admin.jobs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block">Create</a>

        <table id="jobsTable" class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 text-left">Title</th>
                <th class="py-2 px-4 text-left">Salary</th>
                <th class="py-2 px-4 text-left">Start Date</th>
                <th class="py-2 px-4 text-left">End Date</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jobs as $job)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $job->title }}</td>
                    <td class="py-2 px-4">{{ $job->salary }}</td>
                    <td class="py-2 px-4">{{ $job->start_date }}</td>
                    <td class="py-2 px-4">{{ $job->expiration_date }}</td>
                    <td class="py-2 px-4 flex space-x-3">
                        <a href="{{ route('admin.jobs.show', $job->id) }}" class="text-green-500 hover:text-green-700">Show</a>
                        <a href="{{ route('admin.jobs.edit', $job->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');" class="inline-block">
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
