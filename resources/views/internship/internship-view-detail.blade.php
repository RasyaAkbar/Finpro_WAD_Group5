@extends('layouts.app')

@section('content')
    <div class="container mx-auto  px-4 py-16 max-w-4xl">
    {{-- Back Button --}}
        <div class="mb-6">
            <a href="{{ route('student.internships') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Internships
            </a>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition-shadow p-8">
        
        {{-- Header Section --}}
        <div class="flex items-start justify-between mb-8 pb-6 border-b border-gray-100">
            <div class="flex items-start">
                <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                    <i class="fas fa-building text-blue-600 text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-blue-800 mb-2">{{ $internship->title }}</h1>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-briefcase mr-2 text-gray-400"></i>
                        <span class="text-lg">{{ $internship->company_name }}</span>
                    </div>
                </div>
            </div>
        </div>
        

        {{-- Deadline Section --}}
            <div class="text-right">
                @php
                    $deadline = \Carbon\Carbon::parse($internship->deadline);
                @endphp
                
                
                
                <div class="text-gray-500 text-sm">
                    <i class="fas fa-calendar-alt mr-1"></i>
                    Due: {{ $deadline->format('F j, Y') }}
                </div>
                <div class="text-gray-400 text-xs mt-1">
                    {{ $deadline->format('l, g:i A') }}
                </div>
            </div>
            
            {{-- Description Section --}}
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                    Description
                </h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <p class="text-gray-700">{{ $internship->description }}</p>
                </div>
            </div>

            {{-- Requirements --}}
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-list-check mr-2 text-green-500"></i>
                    Requirements
                </h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $internship->requirements }}</div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                    <i class="fas fa-building mr-2"></i>
                    Company Information
                </h3>
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700">Company:</span>
                        <span class="font-medium text-gray-800">{{ $internship->company_name }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700">Position:</span>
                        <span class="font-medium text-gray-800">{{ $internship->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
