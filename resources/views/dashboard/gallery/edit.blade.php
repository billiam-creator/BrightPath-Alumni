@extends('dashboard.layout')

@section('content')
<div class="max-w-3xl mx-auto p-4">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">✏️ Edit Image</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="caption" class="block text-gray-700 font-semibold mb-2">Caption</label>
            <input type="text" name="caption" id="caption" value="{{ old('caption', $gallery->caption) }}"
                   class="w-full border-gray-300 rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Current Image</label>
            <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="Image" class="w-64 h-40 object-cover rounded mb-2">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Replace Image (optional)</label>
            <input type="file" name="image" id="image" class="w-full border-gray-300 rounded p-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Image</button>
        <a href="{{ route('dashboard.gallery.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
    </form>
</div>
@endsection
