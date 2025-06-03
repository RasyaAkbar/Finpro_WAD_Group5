<div class="mb-4">
    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title', $scholarship->title ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
</div>

<div class="mb-4">
    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
    <textarea id="description" name="description"
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
              rows="4">{{ old('description', $scholarship->description ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label for="eligibility" class="block text-sm font-medium text-gray-700">Eligibility</label>
    <input type="text" id="eligibility" name="eligibility" value="{{ old('eligibility', $scholarship->eligibility ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
</div>

<div class="mb-4">
    <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
    <input type="date" id="deadline" name="deadline" value="{{ old('deadline', $scholarship->deadline ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
</div>

<div class="mb-4">
    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
    <select name="category" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @foreach(['Undergraduate', 'Graduate', 'International', 'Other'] as $option)
            <option value="{{ $option }}" {{ old('category', $scholarship->category ?? '') == $option ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label for="urgency" class="block text-sm font-medium text-gray-700">Urgency Level</label>
    <select name="urgency" id="urgency" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        @foreach(['low', 'medium', 'high'] as $option)
            <option value="{{ $option }}" {{ old('urgency', $scholarship->urgency ?? '') == $option ? 'selected' : '' }}>
                {{ ucfirst($option) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label for="attachment" class="block text-sm font-medium text-gray-700">Attachment (optional)</label>
    <input type="file" name="attachment" id="attachment" class="mt-1 block w-full">
</div>
