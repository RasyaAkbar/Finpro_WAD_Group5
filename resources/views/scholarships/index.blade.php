@extends('layouts.app')

@section('content')
<div class="pt-24 pb-10 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen px-4">
    <div class="max-w-6xl mx-auto">
        <div class="mb-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-2">🎓 Scholarship Opportunities</h1>
            <p class="text-gray-600">Find the right scholarship for your academic journey.</p>
        </div>

        <form method="GET" class="mb-6 flex flex-col md:flex-row gap-4 justify-between items-center">
            <input type="text" name="search" placeholder="Search scholarships..."
                   value="{{ request('search') }}"
                   class="search-input px-4 py-2 rounded w-full md:w-1/2">

            <select name="category" class="search-input px-4 py-2 rounded w-full md:w-1/4">
                <option value="">All Categories</option>
                @foreach(['Undergraduate', 'Graduate', 'International', 'Other'] as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                        {{ $cat }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Filter
            </button>
        </form>

        @auth
            @if(auth()->user()->role === 'admin')
                <div class="text-right mb-6">
                    <a href="{{ route('admin.scholarships.create') }}"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm shadow">
                            + Add Scholarship
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
            @forelse($scholarships as $scholarship)
                <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition-all p-4 flex flex-col justify-between">
                    <div>
                        
                        <h2 class="text-lg font-semibold text-blue-700">{{ $scholarship->title }}</h2>

                        <p class="text-sm text-gray-600 mt-1 mb-2">{{ Str::limit($scholarship->description, 100) }}</p>

                        <p class="text-xs text-gray-500 mb-1"><strong>Eligibility:</strong> {{ $scholarship->eligibility }}</p>

                        <p class="text-xs text-gray-500 mb-1"><strong>Deadline:</strong> {{ $scholarship->deadline ? $scholarship->deadline->format('Y-m-d') : 'N/A' }}</p>

                        @php
                            $urgencyClasses = [
                                'low' => 'text-green-600 bg-green-100',
                                'medium' => 'text-yellow-600 bg-yellow-100',
                                'high' => 'text-red-600 bg-red-100',
                            ];
                        @endphp
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded {{ $urgencyClasses[$scholarship->urgency] ?? '' }}">
                            {{ ucfirst($scholarship->urgency) }} urgency
                        </span>
                    </div>

                    <div class="mt-4 flex flex-wrap gap-2">
                        <a href="{{ route('scholarships.show', $scholarship) }}"
                           class="text-xs bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 rounded">View</a>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.scholarships.edit', $scholarship) }}"
                                   class="text-xs bg-yellow-100 hover:bg-yellow-200 text-yellow-800 px-3 py-1 rounded">Edit</a>
                                    <form action="{{ route('admin.scholarships.destroy', $scholarship) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this scholarship?')"
                                            class="text-xs bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-3">No scholarship information available right now.</p>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $scholarships->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection
