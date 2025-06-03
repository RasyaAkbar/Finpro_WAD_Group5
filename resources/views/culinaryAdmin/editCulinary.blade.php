@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Culinary View</h1>

    <form method="POST" action="{{ route('culinaryAdmin.updateCulinary', $culinary) }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-medium mb-2">Culinary Title</label>
            <input type="text" name="title" id="title" value="{{ $culinary->title }}" placeholder="Input Culinary Title" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-medium mb-2">Culinary Content</label>
            <textarea name="content" id="content" placeholder="Input Culinary Contents" rows="6" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ $culinary->content }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-medium mb-2">Culinary Photo</label>
            <input type="file" name="image" id="image" accept="image/*" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        @if($culinary->image)
        <div class="mb-6">
            <p class="text-sm text-gray-500">Current picture:</p>
            <img src="{{ asset('storage/' . $culinary->image) }}" alt="Image Culinary" class="w-64 h-auto rounded mt-2">
        </div>
        @endif

        <div class="flex justify-start items-center mt-6 p-2 space-x-4">
            <a href="{{ route('culinaryAdmin.indexCulinary') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-full hover:bg-gray-400 transition duration-300">
                Back
            </a>
            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-full hover:bg-yellow-600 transition duration-300">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
