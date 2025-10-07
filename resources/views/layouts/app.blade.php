<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Lab TRPL') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-teal-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                    </svg>
                                </div>
                                <div>
                                    <a href="{{ route('home') }}" class="text-xl font-bold text-gray-900">
                                        Lab TRPL
                                    </a>
                                    <p class="text-xs text-gray-500 leading-none">Teknik Rekayasa Perangkat Lunak</p>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden md:ml-10 md:flex md:space-x-8">
                            <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'text-teal-600 border-b-2 border-teal-600' : 'text-gray-500 hover:text-gray-700 border-b-2 border-transparent hover:border-gray-300' }}">
                                Beranda
                            </a>
                            <a href="{{ route('dosen.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('dosen.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'text-gray-500 hover:text-gray-700 border-b-2 border-transparent hover:border-gray-300' }}">
                                Dosen
                            </a>
                            <a href="{{ route('lab.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('lab.*') ? 'text-teal-600 border-b-2 border-teal-600' : 'text-gray-500 hover:text-gray-700 border-b-2 border-transparent hover:border-gray-300' }}">
                                Laboratorium
                            </a>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-teal-500 transition-colors duration-200">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white">
                    <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('home') ? 'text-teal-600 bg-teal-50' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }}">
                        Beranda
                    </a>
                    <a href="{{ route('dosen.index') }}" class="block px-3 py-2 text-base font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('dosen.*') ? 'text-teal-600 bg-teal-50' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }}">
                        Dosen
                    </a>
                    <a href="{{ route('lab.index') }}" class="block px-3 py-2 text-base font-medium rounded-md transition-colors duration-200 {{ request()->routeIs('lab.*') ? 'text-teal-600 bg-teal-50' : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }}">
                        Laboratorium
                    </a>
                </div>
            </div>
        </nav>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        
    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-8 h-8 bg-teal-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">Lab TRPL</h3>
                            <p class="text-gray-400 text-sm">Teknik Rekayasa Perangkat Lunak</p>
                        </div>
                    </div>
                    <p class="text-gray-400">
                        Pusat riset dan pengembangan teknologi perangkat lunak untuk masa depan yang lebih baik.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ route('dosen.index') }}" class="text-gray-400 hover:text-white transition-colors">Dosen</a></li>
                        <li><a href="{{ route('lab.index') }}" class="text-gray-400 hover:text-white transition-colors">Laboratorium</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                    <div class="space-y-2 text-gray-400">
                        <p>Fakultas Teknik</p>
                        <p>Universitas XYZ</p>
                        <p>Email: lab.trpl@university.ac.id</p>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Lab TRPL. All rights reserved.</p>
            </div>
        </div>
    </footer>
    </div>

    <!-- Mobile menu toggle script -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    
    @livewireScripts
</body>
</html>
