<x-app-layout>
    <div class="container mx-auto p-6 bg-white shadow-md rounded-md max-w-3xl mt-8">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Company Details</h2>

        <div class="mb-4">
            <strong class="block text-gray-700 mb-1">Company Name:</strong>
            <span class="text-gray-900">{{ $company->user->name }}</span>
        </div>

        <div class="mb-4">
            <strong class="block text-gray-700 mb-1">Email:</strong>
            <span class="text-gray-900">{{ $company->user->email }}</span>
        </div>

        <div class="mb-4">
            <strong class="block text-gray-700 mb-1">Phone Number:</strong>
            <span class="text-gray-900">{{ $company->user->phone_number ?? '-' }}</span>
        </div>

        <div class="mb-4">
            <strong class="block text-gray-700 mb-1">URI:</strong>
            <span class="text-gray-900">{{ $company->uri ?? '-' }}</span>
        </div>

        <div class="mb-4">
            <strong class="block text-gray-700 mb-1">Approval Status:</strong>
            @if ($company->is_approved)
                <span class="text-green-600 font-semibold">Approved</span>
            @else
                <span class="text-red-600 font-semibold">Pending</span>
            @endif
            @if(!$company->is_approved && $company->reject_reason)
                <div class="mb-4">
                    <strong>Rejection Reason:</strong>
                    <p class="text-red-600">{{ $company->reject_reason }}</p>
                </div>
            @endif
        </div>

        <div class="flex space-x-4 mt-8">
            <form action="{{ route('admin.companies.approve', $company->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md transition duration-150">
                    Approve
                </button>
            </form>

            <form action="{{ route('admin.companies.reject', $company->id) }}" method="POST" onsubmit="return askRejectReason(this);">
                @csrf
                @method('PATCH')
                <input type="hidden" name="reject_reason" id="reject_reason_input">
                <button type="submit"
                        style="background-color: #b91c1c; color: white; padding: 0.5rem 1.5rem; border-radius: 0.375rem;">
                    Reject
                </button>

            </form>

            <script>
                function askRejectReason(form) {
                    const reason = prompt("Please enter the reason for rejecting this company:");

                    if (reason === null || reason.trim() === "") {
                        alert("Rejection reason is required.");
                        return false;
                    }


                    form.querySelector('#reject_reason_input').value = reason.trim();
                    return true;
                }
            </script>

        </div>
    </div>
</x-app-layout>
