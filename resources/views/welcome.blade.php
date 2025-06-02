@extends('layouts.app')

@section('content')

        <section id="home" class="pt-24 pb-10 px-4 min-h-screen flex items-center justify-center">
        <div class="max-w-6xl mx-auto text-center">
            <div class="mb-8">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-blue-800">iU</span>
                </div>
            </div>

            <h1 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">
                Welcome to <span class="text-purple-600">inTel-U</span>
            </h1>
            <p class="text-gray-600 text-lg mb-8 max-w-3xl mx-auto">
                Your comprehensive platform for academic excellence, scholarships, internships, and campus life
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="/" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow transition-colors">
                    Get Started Today
                </a>
                <a href="#features" class="bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                    Explore Features
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="pt-16 pb-10 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="mb-12 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-4">Everything You Need in One Platform</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Discover opportunities, manage your academic journey, and connect with your campus community
                </p>
            </div>

            <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <!-- Scholarship Information -->
                <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition-all p-6">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-3">Scholarship Information</h3>
                    <p class="text-gray-600 text-sm mb-4">Discover and apply for scholarships that match your profile and academic achievements.</p>
                    <a href="#" class="text-blue-600 font-semibold hover:text-blue-700 text-sm transition-colors">Learn More →</a>
                </div>

                <!-- Campus Activities -->
                <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition-all p-6">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-3">Campus Activities</h3>
                    <p class="text-gray-600 text-sm mb-4">Stay updated with campus events, clubs, and activities to enrich your student experience.</p>
                    <a href="#" class="text-green-600 font-semibold hover:text-green-700 text-sm transition-colors">Explore →</a>
                </div>

                <!-- Internship Opportunities -->
                <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition-all p-6">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 002 2M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M8 6H6a2 2 0 00-2 2v6a2 2 0 002 2h2m8-8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-3">Internship Opportunities</h3>
                    <p class="text-gray-600 text-sm mb-4">Find internships that align with your career goals and gain valuable work experience.</p>
                    <a href="{{ route('student.internships')}}" class="text-purple-600 font-semibold hover:text-purple-700 text-sm transition-colors">Apply Now →</a>
                </div>

                <!-- Local Culinary -->
                <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition-all p-6">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-3">Local Culinary</h3>
                    <p class="text-gray-600 text-sm mb-4">Discover local restaurants, cafes, and dining options around your campus area.</p>
                    <a href="#" class="text-red-600 font-semibold hover:text-red-700 text-sm transition-colors">Discover →</a>
                </div>

                <!-- Competition Information -->
                <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition-all p-6">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-3">Competition Information</h3>
                    <p class="text-gray-600 text-sm mb-4">Participate in academic competitions and showcase your skills on various platforms.</p>
                    <a href="#" class="text-yellow-600 font-semibold hover:text-yellow-700 text-sm transition-colors">Compete →</a>
                </div>

                <!-- Search & Filter -->
                <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md transition-all p-6">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-blue-700 mb-3">Smart Search</h3>
                    <p class="text-gray-600 text-sm mb-4">Find exactly what you need with our powerful search and filtering capabilities.</p>
                    <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-700 text-sm transition-colors">Search →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="pt-16 pb-10 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-white border border-gray-200 rounded-xl shadow p-8">
                <h2 class="text-3xl font-bold text-blue-800 mb-4">Ready to Transform Your Academic Journey?</h2>
                <p class="text-gray-600 mb-8">Join thousands of students who are already using inTel-U to achieve their goals.</p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow transition-colors">
                        Sign Up Free
                    </a>
                    <a href="#" class="bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-colors">
                        Login Now
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection