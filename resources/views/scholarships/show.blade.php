@extends('layouts.app')

@section('content')
<div class="pt-24 pb-10 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen px-4">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold text-blue-800 mb-4">{{ $scholarship->title }}</h1>

        <p class="mb-2 text-gray-700"><strong>Description:</strong> {{ $scholarship->description }}</p>
        <p class="mb-2 text-gray-700"><strong>Eligibility:</strong> {{ $scholarship->eligibility }}</p>
        <p class="mb-4 text-gray-700"><strong>Deadline:</strong> {{ $scholarship->deadline ? $scholarship->deadline->format('Y-m-d') : 'N/A' }}</p>

        <a href="{{ route('scholarships.index') }}"
           class="inline-block bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded shadow">
            ← Back to List
        </a>
    </div>
</div>
@endsection