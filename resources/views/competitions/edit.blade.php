@extends('layouts.app')

@section('content')
<div class="pt-24 pb-10 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen px-4">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold text-blue-800 mb-4">Edit Competition</h1>

        <!-- Error Handling -->
        @if($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form for Editing Competition -->
        <form method="POST" action="{{ route('admin.competitions.update', $competition->id) }}">
            @csrf
            @method('PUT')

            <!-- Title -->
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $competition->title) }}"
                   class="w-full p-2 border rounded mb-4" required>

            <!-- Description -->
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="w-full p-2 border rounded mb-4" required>{{ old('description', $competition->description) }}</textarea>

            <!-- Category -->
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <input type="text" name="category" id="category" value="{{ old('category', $competition->category) }}"
                   class="w-full p-2 border rounded mb-4" required>

            <!-- Organizer -->
            <label for="organizer" class="block text-sm font-medium text-gray-700">Organizer</label>
            <input type="text" name="organizer" id="organizer" value="{{ old('organizer', $competition->organizer) }}"
                   class="w-full p-2 border rounded mb-4" required>

            <!-- Start Date -->
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $competition->start_date) }}"
                   class="w-full p-2 border rounded mb-4" required>

            <!-- End Date -->
            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $competition->end_date) }}"
                   class="w-full p-2 border rounded mb-4" required>

            <!-- Link (Optional) -->
            <label for="link" class="block text-sm font-medium text-gray-700">Link (optional)</label>
            <input type="url" name="link" id="link" value="{{ old('link', $competition->link) }}"
                   class="w-full p-2 border rounded mb-4">

            <!-- Submit Button -->
            <button type="submit" class="mt-4 w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded shadow">
                Update Competition
            </button>

            <!-- Cancel Button -->
            <a href="{{ route('admin.competitions.index') }}" class="mt-4 block text-center text-gray-600 hover:underline">
                Cancel
            </a>
        </form>
    </div>
</div>
@endsection
