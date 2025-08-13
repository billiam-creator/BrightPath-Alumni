@extends('dashboard.layout')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">✏️ Edit Member</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 mb-4 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.members.update', $member->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}"
                class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200" required>
        </div>

        <div>
            <label for="role" class="block text-sm font-medium">Role</label>
            <input type="text" name="role" id="role" value="{{ old('role', $member->role) }}"
                class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label for="photo" class="block text-sm font-medium">Photo</label>
            <input type="file" name="photo" id="photo"
                class="mt-1 block w-full text-sm text-gray-600 border-gray-300 rounded shadow-sm focus:ring focus:ring-blue-200">
            @if($member->photo)
                <img src="{{ asset('storage/' . $member->photo) }}" alt="Current Photo" class="w-24 h-24 mt-2 rounded shadow">
            @endif
        </div>

        <div class="flex justify-between">
            <a href="{{ route('dashboard.members.index') }}" class="text-gray-600 hover:underline">← Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Member</button>
        </div>
    </form>
</div>
@endsection
