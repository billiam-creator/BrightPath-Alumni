@extends('dashboard.layout')

@section('content')
<div class="max-w-5xl mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-blue-600">📅 All Events</h1>
        <a href="{{ route('dashboard.events.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Event</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full table-auto text-left">
            <thead>
                <tr class="bg-gray-200 text-sm uppercase text-gray-600">
                    <th class="p-2">Title</th>
                    <th class="p-2">Date</th>
                    <th class="p-2">Description</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-2">{{ $event->title }}</td>
                        <td class="p-2">{{ $event->date }}</td>
                        <td class="p-2">{{ $event->description }}</td>
                        <td class="p-2 flex gap-2">
                            <a href="{{ route('dashboard.events.edit', $event->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('dashboard.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center p-4 text-gray-500">No events found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
