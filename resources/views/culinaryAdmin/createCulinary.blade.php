@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">New Culinary View</h2>

    <form method="POST" action="{{ route('culinaryAdmin.storeCulinary') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-medium mb-2">Culinary Title</label>
            <input type="text" name="title" id="title" placeholder="Input Culinary Title" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-medium mb-2">Culinary Content</label>
            <textarea name="content" id="content" placeholder="Input Culinary Content" rows="6" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
        </div>

         <div class="mb-6">
            <label for="image" class="block text-gray-700 text-sm font-medium mb-2">Culinary Data</label>
            <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <div id="imagePreview" class="mt-2"> 
                <p id="preview-text" class="text-sm text-gray-500">No photo</p>
                <img id="preview" class="mt-4 h-auto rounded-md w-2/3 hidden" />
            </div>
        </div> 

        <div class="flex justify-start items-center gap-6 pt-2 space-x-4">
            <a href="{{ route('culinaryAdmin.indexCulinary') }}" class="bg-gray-200 px-6 py-2 rounded-full hover:bg-gray-400 transition duration-300">
                Back
            </a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition duration-300">
                Save
            </button>
        </div>
    </form>
</div>


<script>
function previewImage(event) {
    const image = document.getElementById('imageMessage');
    const preview = document.getElementById('preview');
    const text = document.getElementById('preview-text');
    const file = event.target.files[0];

    if (file) {
        const previewUrl = URL.createObjectURL(file);
        preview.classList.remove('hidden');
        preview.src = previewUrl;
        text.textContent = 'Menampilkan gambar:';
    } else {
        preview.classList.add('hidden');
        preview.src = '';
        text.textContent = 'Tidak ada foto';
    }
}
</script>
@endsection
