<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Opportunities - inTel-U</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @yield('style');
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="glass-nav fixed w-full top-0 z-50 px-6 py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">iU</span>
                        </div>
                        <span class="ml-3 text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            inTel-U
                        </span>
                    </div>
                </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700/80 hover:text-blue-600  transition-colors">Home</a>
                <a href="#" class="text-gray-700/80 hover:text-blue-600 px-3 py-2 rounded-md text-sm transition-colors font-semibold">Internships</a>
                <a href="#" class="text-gray-700/80 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Scholarships</a>
                <a href="#" class="text-gray-700/80 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Activities</a>
                <a href="#" class="text-gray-700/80 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Competitions</a>
            </div>
            
            <div class="flex items-center space-x-4">
                @auth
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-gray-400/80 text-sm"></i>
                        </div>
                        <span class="text-gray-700/80 text-sm">{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700/80 hover:text-black transition-colors">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg font-medium hover:bg-blue-50 transition-colors shadow-sm border border-blue-200">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-lg font-medium hover:shadow-lg transform hover:scale-105 transition-all">
                        Sign Up
                    </a>
                </div>
                @endauth
                
                <button class="md:hidden text-white" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        
        
    </nav>
    
    <div class="">
        @if(session('error') || session('success'))
            @php
                $type = session('error') ? 'error' : 'success';
                $message = session($type);
                $bgColor = $type === 'error' ? 'bg-red-500' : 'bg-green-500';
                $id = $type . 'Message';
                $closeFunction = 'close' . ucfirst($type) . 'Message';
            @endphp

            <div id="{{ $id }}" class="{{ $bgColor }} text-white p-5 rounded-lg mt-14 relative">
                <span>{{ $message }}</span>
                <button class="ml-5 text-white font-bold" onclick="{{ $closeFunction }}()">X</button>
            </div>
            <script>
                function {{ $closeFunction }}() {
                    document.getElementById('{{ $id }}').classList.add('hidden');
                }

                setTimeout(function() {
                    var el = document.getElementById('{{ $id }}');
                    if (el) el.classList.add('hidden');
                }, 5000);
            </script>
        @endif
        @yield('content')
        
    </div>
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">iU</span>
                        </div>
                        <span class="ml-3 text-2xl font-bold">inTel-U</span>
                    </div>
                    <p class="text-gray-400 mb-4">Making students life easier with academic resources and opportunities.</p>
                </div>
                
            </div>
            <div class="border-t border-gray-800 pt-8 mt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} inTel-U. All rights reserved. Built with Laravel 12.</p>
            </div>
        </div>
    </footer>

    <script>

        // Add navbar background on scroll
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('bg-white', 'shadow-lg');
                nav.classList.remove('glass-effect');
            } else {
                nav.classList.remove('bg-white', 'shadow-lg');
                nav.classList.add('glass-effect');
            }
        });
    </script>
</body>
</html>