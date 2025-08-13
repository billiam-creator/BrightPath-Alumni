@extends('dashboard.layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">✏️ Edit Event</h1>

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('dashboard.events.update', $event->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Title</label>
        <input type="text" name="title" value="{{ old('title', $event->title) }}" class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block font-semibold">Description</label>
        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description', $event->description) }}</textarea>
    </div>

    <div>
        <label class="block font-semibold">Date</label>
        <input type="date" name="date" value="{{ old('date', $event->date) }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="flex gap-4 mt-6">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">✅ Update Event</button>
        <a href="{{ route('dashboard.events.index') }}" class="text-gray-600 hover:underline">← Cancel</a>
    </div>
</form>
@endsection
