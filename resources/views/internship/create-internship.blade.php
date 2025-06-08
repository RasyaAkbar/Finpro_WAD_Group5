@extends('layouts.app')

@section('content')
<div class="pt-24 pb-10 px-4">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md p-8">
                <!-- Header Section -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4">
                        <i class="fas fa-briefcase text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-blue-800 mb-2">Create Internship</h1>
                    <p class="text-gray-600">Post a new internship opportunity for students</p>
                </div>

                <!-- Create Internship Form -->
                <form action="{{ route('student.internships.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Internship Title -->
                    <div>
                        <label for="title" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-heading mr-2 text-gray-500"></i>Internship Title
                        </label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                            placeholder="e.g. Software Development Intern"
                            value="{{ old('title') }}"
                        >
                        @error('title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Company Name -->
                    <div>
                        <label for="company_name" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-building mr-2 text-gray-500"></i>Company Name
                        </label>
                        <input 
                            type="text" 
                            id="company_name" 
                            name="company_name" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                            placeholder="Enter company name"
                            value="{{ old('company_name') }}"
                        >
                        @error('company_name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-align-left mr-2 text-gray-500"></i>Job Description
                        </label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="5"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-vertical"
                            placeholder="Describe the internship role, responsibilities, and what the intern will learn..."
                        >{{ old('description') }}</textarea>
                        
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Requirements -->
                    <div>
                        <label for="requirements" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-list-check mr-2 text-gray-500"></i>Requirements
                        </label>
                        <textarea 
                            id="requirements" 
                            name="requirements" 
                            rows="4"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-vertical"
                            placeholder="List the required skills, qualifications, and experience..."
                        >{{ old('requirements') }}</textarea>
                    
                        @error('requirements')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Application Deadline -->
                    <div>
                        <label for="deadline" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-calendar-alt mr-2 text-gray-500"></i>Application Deadline
                        </label>
                        <div class="relative">
                            <input 
                                type="datetime-local" 
                                id="deadline" 
                                name="deadline" 
                                required
                                min="{{ date('Y-m-d\TH:i') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                value="{{ old('deadline') }}"
                            >
                        </div>
                        
                        @error('deadline')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <button 
                            type="submit" 
                            class="flex-1 bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                            <i class="fas fa-plus mr-2"></i>Create Internship
                        </button>
                        
                        
                    </div>
                </form>

        
                <!-- Navigation Links -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-sm">
                    
                    
                    <a href="{{ route('student.internships') }}" class="text-gray-500 hover:text-gray-700 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
                    </a>
                </div>
            </div>

            
        </div>
    </div>

    <!-- Success/Error Messages -->
    <div id="successMessage" class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md hidden">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <span>Internship created successfully!</span>
        </div>
    </div>

    <div id="errorMessage" class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md hidden">
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <span>Please check your information and try again.</span>
        </div>
    </div>

    <script>

        // Form validation and submission
        document.querySelector('form').addEventListener('submit', function(e) {
            const deadline = new Date(document.getElementById('deadline').value);
            const now = new Date();
            
            if (deadline <= now) {
                e.preventDefault();
                alert('Please set a deadline that is in the future.');
                return;
            }

        });

        
    </script>
@endsection