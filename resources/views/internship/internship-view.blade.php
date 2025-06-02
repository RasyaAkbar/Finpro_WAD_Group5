
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
                
                <!-- Filter Buttons -->
                <div class="flex flex-wrap gap-3">
                    <button onclick="filterBy('all')" class="filter-btn filter-active px-4 py-2 rounded-lg text-black/80 hover:bg-white/20 transition-colors">
                        All Internships
                    </button>
                    <button onclick="filterBy('technology')" class="filter-btn px-4 py-2 rounded-lg text-black/80 hover:bg-white/20 transition-colors">
                        <i class="fas fa-code mr-2"></i>Technology
                    </button>
                    <button onclick="filterBy('business')" class="filter-btn px-4 py-2 rounded-lg text-black/80 hover:bg-white/20 transition-colors">
                        <i class="fas fa-chart-line mr-2"></i>Business
                    </button>
                    <button onclick="filterBy('design')" class="filter-btn px-4 py-2 rounded-lg text-black/80 hover:bg-white/20 transition-colors">
                        <i class="fas fa-palette mr-2"></i>Design
                    </button>
                    <button onclick="filterBy('marketing')" class="filter-btn px-4 py-2 rounded-lg text-black/80 hover:bg-white/20 transition-colors">
                        <i class="fas fa-megaphone mr-2"></i>Marketing
                    </button>
                    <button onclick="filterBy('remote')" class="filter-btn px-4 py-2 rounded-lg text-black/80 hover:bg-white/20 transition-colors">
                        <i class="fas fa-home mr-2"></i>Remote
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Internships Grid -->
    <section class="px-6 pb-16">
        <div class="max-w-7xl mx-auto">
            <div id="internshipsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <div class="text-right mb-6">
                            <a href="{{ route('scholarships.create') }}"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm shadow">
                                + Add Scholarship
                            </a>
                        </div>
                    @endif
                @endauth


                <!-- Internship Card 1 -->
                <div class="internship-card glass-card rounded-2xl p-6 hover-lift urgency-high" data-category="technology" data-type="onsite">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                            <i class="fab fa-google text-black text-xl"></i>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="bg-red-500/20 text-red-300 px-3 py-1 rounded-full text-sm">Urgent</span>
                            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm">On-site</span>
                        </div>
                    </div>
                    
                    <h3 class="text-xl font-bold text-black mb-2">Software Engineering Intern</h3>
                    <p class="text-black/70 mb-1">Google Indonesia</p>
                    <p class="text-black/60 mb-4">Jakarta, Indonesia</p>
                    
                    <p class="text-black/80 text-sm mb-4 line-clamp-3">
                        Join Google's engineering team to work on cutting-edge projects. You'll collaborate with world-class engineers and contribute to products used by billions.
                    </p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4 text-sm text-black/60">
                            <span><i class="fas fa-clock mr-1"></i>3-6 months</span>
                            <span><i class="fas fa-money-bill mr-1"></i>Paid</span>
                        </div>
                        <div class="flex items-center text-yellow-400">
                            <i class="fas fa-star text-sm"></i>
                            <span class="text-black/80 text-sm ml-1">4.8</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-white/10 text-black/80 px-2 py-1 rounded text-xs">Python</span>
                        <span class="bg-white/10 text-black/80 px-2 py-1 rounded text-xs">Java</span>
                        <span class="bg-white/10 text-black/80 px-2 py-1 rounded text-xs">Cloud</span>
                    </div>
                    
                    <button onclick="viewInternship(1)" class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-black py-3 rounded-xl hover:from-purple-600 hover:to-pink-600 transition-all">
                        View Details
                    </button>
                </div>

        </div>
    </section>

    <!-- Modal for Internship Details -->
    <div id="internshipModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="glass-card rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-black">Internship Details</h2>
                    <button onclick="closeModal()" class="text-black/60 hover:text-black transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <div id="modalContent">
                    <!-- Content will be populated by JavaScript -->
                </div>
            </div>
        </div>
    </div>
@endsection
