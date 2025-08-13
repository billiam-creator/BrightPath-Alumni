@extends('dashboard.layout')

@section('content')
<div class="max-w-5xl mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-blue-600">🖼️ Gallery</h1>
        <a href="{{ route('dashboard.gallery.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Upload Image
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($images->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($images as $image)
                <div class="bg-white rounded shadow p-3">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image" class="w-full h-48 object-cover rounded">
                    
                    @if($image->caption)
                        <p class="text-sm mt-2 text-gray-700">{{ $image->caption }}</p>
                    @endif

                    <div class="mt-3 flex justify-between">
                        <a href="{{ route('dashboard.gallery.edit', $image->id) }}"
                           class="text-blue-600 hover:underline text-sm">✏️ Edit</a>

                        <form action="{{ route('dashboard.gallery.destroy', $image->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this image?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline text-sm">🗑️ Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No images uploaded yet.</p>
    @endif
</div>
@endsection
