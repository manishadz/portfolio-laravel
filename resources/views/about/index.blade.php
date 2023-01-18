<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    {{-- @if (session()->has('success'))
                    @endif --}}
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="description">Write something about you</label>
                            <textarea class="form-control" name="description" id="description" rows="4">{{ @$about->description ?? old('description') }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="image">Choose Image</label>
                                <input type="file" name="image" class="form-control" id="image" />
                                <br>
                                <img src="{{ asset('uploads/about/'.@$about->image) }}" alt="" height="200px" width="200">
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <button type="submit " class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
