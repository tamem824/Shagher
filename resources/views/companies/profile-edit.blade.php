<x-guest.layouts.app :categories="$categories">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Edit Company Profile</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('company.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Company Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Company Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{ old('name', $company->name) }}" required>
                            </div>

                            {{-- Description --}}
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $company->description) }}</textarea>
                            </div>

                            {{-- Address --}}
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                       value="{{ old('address', $company->address) }}">
                            </div>

                            {{--comany uri--}}

                            <div class="mb-3">
                                <label for="uri" class="form-label">Uri</label>
                                <input type="text" name="uri" id="uri" class="form-control"
                                       value="{{ old('uri', $company->uri) }}">
                            </div>


                            {{-- Company Photo --}}
                            <div class="mb-3">
                                <label for="photo" class="form-label">Company Logo</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                                @if($company->photo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $company->photo) }}" alt="Company Photo"
                                             width="100" class="rounded border">
                                    </div>
                                @endif
                            </div>

                            {{-- Submit Button --}}
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest.layouts.app>
