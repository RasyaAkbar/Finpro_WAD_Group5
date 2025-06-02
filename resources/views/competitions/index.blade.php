
@extends('layouts.app')

@section('content')
<div class="pt-24 pb-10 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen px-4">
    <div class="max-w-6xl mx-auto">
        <div class="mb-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-2">🎓Competitions</h1>
            <p class="text-gray-600">Discover academic competitions</p>
        </div>

       <form method="GET" class="mb-6 flex flex-col md:flex-row gap-4 justify-between items-center">
            <input type="text" name="search" placeholder="Search competitions..."
                value="{{ request('search') }}"
                class="search-input px-4 py-2 rounded w-full md:w-1/1 bg-white">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Filter
            </button>
        </form>

        @auth
            @if(auth()->user()->role === 'admin')
                <div class="text-right mb-6">
                    <a href="{{ route('competition.create') }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm shadow">
                        + Add Competitions
                    </a>
                </div>
            @endif
        @endauth

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4 shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @forelse($competitions as $competition)
                <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition-all p-4 flex flex-col justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-blue-700">{{ $competition->title }}</h2>
                        <p class="mb-2 text-gray-700"><strong>Description:</strong> {{ $competition->description }}</p>
                        <p class="mb-2 text-gray-700"><strong>Category:</strong> {{ $competition->category }}</p>
                        <p class="mb-4 text-gray-700"><strong>Organizer:</strong> {{ $competition->organizer}}</p>
                    </div>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <a href="{{ route('competitions.show', $competition) }}"
                           class="text-xs bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 rounded">View</a>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.competitions.edit', $competition) }}"
                                   class="text-xs bg-yellow-100 hover:bg-yellow-200 text-yellow-800 px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('admin.competitions.destroy', $competition) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this competition?')"
                                            class="text-xs bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-3">No competition information available right now.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection