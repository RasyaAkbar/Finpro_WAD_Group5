@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="pt-24 pb-12 px-6">
        <div class="max-w-7xl mx-auto text-center">
            <div class="mt-8 mb-8">
                <i class="fas fa-briefcase text-6xl text-black/80"></i>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold text-black mb-6">
                Internship <span class="bg-gradient-to-r from-purple-300 to-pink-300 bg-clip-text text-transparent">Opportunities</span>
            </h1>
            <p class="text-xl text-black/80 mb-8 max-w-3xl mx-auto">
                Discover amazing internship opportunities that will kickstart your career. Connect with top companies and gain valuable experience in your field.
            </p>
        </div>
    </section>

    <!-- Search and Filters -->
    <section class="px-6 mb-12">
        <div class="max-w-7xl mx-auto">
            <div class="glass-card rounded-2xl p-6 mb-8">
                <!-- Search Bar -->
                <div class="flex flex-col md:flex-row gap-4 mb-6">
                    <div class="flex-1 relative">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-black/60"></i>
                        <input type="text" id="searchInput" placeholder="Search internships by company, role, or keywords..." 
                               class="search-input w-full pl-12 pr-4 py-3 rounded-xl text-black placeholder-white/60">
                    </div>
                    <button onclick="searchInternships()" class="bg-gradient-to-r from-purple-500 to-pink-500 text-black px-8 py-3 rounded-xl hover:from-purple-600 hover:to-pink-600 transition-all hover-lift">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
                
                 @auth
                    @if(auth()->user()->role === 'admin')
                        <div class="text-right mb-6">
                            <a href="{{ route('student.internships.create') }}"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm shadow">
                                + Add Internships
                            </a>
                        </div>
                    @endif
                @endauth
                
            </div>
        </div>
    </section>

    <!-- Internships Grid -->
    <section class="px-6 pb-16">
        <div class="max-w-7xl mx-auto">
            <div id="internshipsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
               


               @foreach($internships as $internship)
                    <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition-shadow p-6">
                        {{-- Header with Company and Deadline --}}
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-3">
                                    <i class="fas fa-building text-blue-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-blue-800 mb-1">{{ $internship->title }}</h3>
                                    <p class="text-gray-600 text-sm">{{ $internship->company_name }}</p>
                                </div>
                            </div>
                            
                            {{-- Deadline Badge --}}
                            <div class="text-right">
                                @php
                                    $deadline = \Carbon\Carbon::parse($internship->deadline);
                                    $daysLeft = round($deadline->diffInDays(now(), true));
                                    $isUrgent = $daysLeft <= 7;
                                @endphp
                                
                                @if($isUrgent)
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">
                                        <i class="fas fa-exclamation-triangle mr-1"></i>
                                        {{ $daysLeft }} days left
                                    </span>
                                @else
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">
                                        <i class="fas fa-clock mr-1"></i>
                                        {{ $daysLeft }} days left
                                    </span>
                                @endif
                                
                                <p class="text-gray-500 text-xs mt-1">
                                    Due: {{ $deadline->format('M j, Y') }}
                                </p>
                            </div>
                        </div>
                        
                        {{-- Description --}}
                        <div class="mb-4">
                            <p class="text-gray-700 text-sm leading-relaxed line-clamp-3">
                                {{ Str::limit($internship->description, 150) }}
                            </p>
                        </div>
                        
                        {{-- Requirements Preview --}}
                        <div class="mb-4">
                            <h4 class="text-gray-800 text-sm font-medium mb-2">
                                <i class="fas fa-list-check mr-1 text-gray-500"></i>
                                Requirements
                            </h4>
                            <div class="text-gray-600 text-sm">
                                {{ $internship->requirements }}
                            </div>
                        </div>
                        
                        {{-- Footer with Actions --}}
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="text-xs text-gray-500">
                                <i class="fas fa-calendar-plus mr-1"></i>
                                Posted {{ \Carbon\Carbon::parse($internship->created_at)->diffForHumans() }}
                            </div>
                            
                            <div class="flex space-x-2">
                                <a href="{{ route('student.internships.show', $internship) }}" 
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-eye mr-1"></i>
                                    View Details
                                </a>
                                
                                @auth
                                @if(auth()->user()->role === 'admin')
                                <a href="{{ route('student.internships.edit', $internship) }}" 
                                class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors">
                                    <i class="fas fa-edit mr-1"></i>
                                    Edit
                                </a>
                                
                                <form action="{{ route('student.internships.destroy', $internship) }}" 
                                      method="POST" 
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this internship? This action cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-100 text-red-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-red-200 transition-colors">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete
                                    </button>
                                </form>
                                @endif
                                @endauth

                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Empty State --}}
                @if($internships->isEmpty())
                <div class="bg-white border border-gray-200 rounded-xl shadow p-12 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-briefcase text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">No Internships Available</h3>
                    <p class="text-gray-600 mb-4">There are currently no internship opportunities posted.</p>
                    
                    
                </div>
                @endif


        </div>
    </section>
@endsection
