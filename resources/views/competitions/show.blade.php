@extends('layouts.app')

@section('content')
<div class="pt-24 pb-10 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen px-4">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold text-blue-800 mb-4">{{ $competition->title }}</h1>

        <p class="mb-2 text-gray-700"><strong>Description:</strong> {{ $competition->description }}</p>
        <p class="mb-2 text-gray-700"><strong>Category:</strong> {{ $competition->category }}</p>
        <p class="mb-4 text-gray-700"><strong>Organizer:</strong> {{ $competition->organizer}}</p>
        <p class="mb-4 text-gray-700"><strong>Start Date:</strong> {{ $competition->start_date}}</p>
        <p class="mb-4 text-gray-700"><strong>End Date:</strong> {{ $competition->end_date}}</p>
        <p class="mb-4 text-gray-700"><strong>Registration Link:</strong> {{ $competition->link}}</p>

        <a href="{{ route('admin.competitions.index') }}" class="inline-block bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded shadow">
            ← Back to List
        </a>
    </div>
</div>
@endsection

