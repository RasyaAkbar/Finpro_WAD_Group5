@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
    {{-- Back Button --}}
        <div class="mb-6">
            <a href="{{ route('internships.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
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
        

        {{-- Deadline Section --}}
            <div class="text-right">
                @php
                    $deadline = \Carbon\Carbon::parse($internship->deadline);
                    $daysLeft = round($deadline->diffInDays(now(), true));
                    $isUrgent = $daysLeft <= 7;
                @endphp
                
                @if($isUrgent)
                    <div class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-medium mb-2">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        {{ $daysLeft }} days left
                    </div>
                @else
                    <div class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-medium mb-2">
                        <i class="fas fa-clock mr-2"></i>
                        {{ $daysLeft }} days left
                    </div>
                @endif
                
                <div class="text-gray-500 text-sm">
                    <i class="fas fa-calendar-alt mr-1"></i>
                    Due: {{ $deadline->format('F j, Y') }}
                </div>
                <div class="text-gray-400 text-xs mt-1">
                    {{ $deadline->format('l, g:i A') }}
                </div>
            </div>
            
        </div>
    </div>
@endsection
