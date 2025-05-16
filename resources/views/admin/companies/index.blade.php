<x-app-layout>
    <div class="container mx-auto p-4">
        <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 text-left">Company Name</th>
                <th class="py-2 px-4 text-left">URI</th>
                <th class="py-2 px-4 text-left">Approved</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $company->user->name }}</td>
                    <td class="py-2 px-4">{{ $company->uri ?? '-' }}</td>
                    <td class="py-2 px-4">
                        @if($company->is_approved)
                            <span class="text-green-600 font-semibold">Approved</span>
                        @elseif(!$company->is_approved && $company->reject_reason)
                            <span class="text-[#dc2626] bg-gray-100 px-2 py-1 rounded font-semibold">Rejected</span>
                        @else
                            <span class="text-[#facc15] bg-black-100 px-2 py-1 rounded font-semibold">Pending</span>
                        @endif
                    </td>


                    <td class="py-2 px-4">
                        <a href="{{ route('admin.companies.show', $company->id) }}" class="text-green-500 hover:text-green-700">Show</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
