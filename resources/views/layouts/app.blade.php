<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PetCare+')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .pagination { display: flex; gap: 0.25rem; flex-wrap: wrap; justify-content: center; }
        .pagination > * { 
            display: inline-flex; 
            align-items: center; 
            justify-content: center; 
            min-width: 2.5rem; 
            height: 2.5rem; 
            padding: 0 0.75rem; 
            font-size: 0.875rem; 
            font-weight: 600; 
            border-radius: 0.5rem; 
            transition: all 0.2s;
        }
        .pagination .active span { 
            background: linear-gradient(to right, rgb(220, 38, 38), rgb(185, 28, 28)); 
            color: white; 
            box-shadow: 0 4px 6px -1px rgba(220, 38, 38, 0.3);
        }
        .pagination a { 
            background: white; 
            color: rgb(107, 114, 128); 
            border: 1px solid rgb(254, 226, 226);
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        .pagination a:hover { 
            background: rgb(254, 226, 226); 
            color: rgb(220, 38, 38); 
            border-color: rgb(220, 38, 38);
        }
        .pagination .disabled span { 
            background: rgb(249, 250, 251); 
            color: rgb(209, 213, 219); 
            cursor: not-allowed;
            border: 1px solid rgb(229, 231, 235);
        }
        @media (max-width: 640px) {
            .pagination > *:not(.active):not(:first-child):not(:last-child) { display: none; }
            .pagination .active { display: inline-flex !important; }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-red-50 via-white to-red-50 min-h-screen font-sans antialiased">
    <nav class="bg-white shadow-sm border-b border-red-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-red-600 to-red-800 bg-clip-text text-transparent">
                            <i class="fas fa-heart-pulse text-red-600 mr-1 sm:mr-2"></i>PetCare+
                        </a>
                    </div>
                    <div class="hidden md:ml-6 lg:ml-10 md:flex md:space-x-1">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-3 lg:px-4 py-2 border-b-2 {{ request()->routeIs('dashboard') ? 'border-red-600 text-red-700 bg-red-50' : 'border-transparent text-gray-600 hover:text-red-600 hover:border-red-300 hover:bg-red-50' }} text-sm font-semibold transition-all duration-200 rounded-t-lg">
                            <i class="fas fa-chart-line mr-1 lg:mr-2"></i><span class="hidden lg:inline">Dashboard</span><span class="lg:hidden">Home</span>
                        </a>
                        <a href="{{ route('owners.index') }}" class="inline-flex items-center px-3 lg:px-4 py-2 border-b-2 {{ request()->routeIs('owners.*') ? 'border-red-600 text-red-700 bg-red-50' : 'border-transparent text-gray-600 hover:text-red-600 hover:border-red-300 hover:bg-red-50' }} text-sm font-semibold transition-all duration-200 rounded-t-lg">
                            <i class="fas fa-users mr-1 lg:mr-2"></i>Owners
                        </a>
                        <a href="{{ route('pets.index') }}" class="inline-flex items-center px-3 lg:px-4 py-2 border-b-2 {{ request()->routeIs('pets.*') ? 'border-red-600 text-red-700 bg-red-50' : 'border-transparent text-gray-600 hover:text-red-600 hover:border-red-300 hover:bg-red-50' }} text-sm font-semibold transition-all duration-200 rounded-t-lg">
                            <i class="fas fa-paw mr-1 lg:mr-2"></i>Pets
                        </a>
                        <a href="{{ route('treatments.index') }}" class="inline-flex items-center px-3 lg:px-4 py-2 border-b-2 {{ request()->routeIs('treatments.*') ? 'border-red-600 text-red-700 bg-red-50' : 'border-transparent text-gray-600 hover:text-red-600 hover:border-red-300 hover:bg-red-50' }} text-sm font-semibold transition-all duration-200 rounded-t-lg">
                            <i class="fas fa-syringe mr-1 lg:mr-2"></i><span class="hidden lg:inline">Treatments</span><span class="lg:hidden">Treat</span>
                        </a>
                        <a href="{{ route('checkups.index') }}" class="inline-flex items-center px-3 lg:px-4 py-2 border-b-2 {{ request()->routeIs('checkups.*') ? 'border-red-600 text-red-700 bg-red-50' : 'border-transparent text-gray-600 hover:text-red-600 hover:border-red-300 hover:bg-red-50' }} text-sm font-semibold transition-all duration-200 rounded-t-lg">
                            <i class="fas fa-clipboard-check mr-1 lg:mr-2"></i><span class="hidden lg:inline">Checkups</span><span class="lg:hidden">Check</span>
                        </a>
                    </div>
                </div>
                <div class="flex items-center md:hidden">
                    <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-600 hover:text-red-600 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500 transition-all duration-200">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden border-t border-red-100 bg-white">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-red-600 text-white' : 'text-gray-600 hover:bg-red-50 hover:text-red-600' }} text-base font-semibold transition-all duration-200">
                    <i class="fas fa-chart-line mr-3 w-5"></i>Dashboard
                </a>
                <a href="{{ route('owners.index') }}" class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('owners.*') ? 'bg-red-600 text-white' : 'text-gray-600 hover:bg-red-50 hover:text-red-600' }} text-base font-semibold transition-all duration-200">
                    <i class="fas fa-users mr-3 w-5"></i>Owners
                </a>
                <a href="{{ route('pets.index') }}" class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('pets.*') ? 'bg-red-600 text-white' : 'text-gray-600 hover:bg-red-50 hover:text-red-600' }} text-base font-semibold transition-all duration-200">
                    <i class="fas fa-paw mr-3 w-5"></i>Pets
                </a>
                <a href="{{ route('treatments.index') }}" class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('treatments.*') ? 'bg-red-600 text-white' : 'text-gray-600 hover:bg-red-50 hover:text-red-600' }} text-base font-semibold transition-all duration-200">
                    <i class="fas fa-syringe mr-3 w-5"></i>Treatments
                </a>
                <a href="{{ route('checkups.index') }}" class="flex items-center px-3 py-2 rounded-lg {{ request()->routeIs('checkups.*') ? 'bg-red-600 text-white' : 'text-gray-600 hover:bg-red-50 hover:text-red-600' }} text-base font-semibold transition-all duration-200">
                    <i class="fas fa-clipboard-check mr-3 w-5"></i>Checkups
                </a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-6 bg-gradient-to-r from-red-50 to-white border-l-4 border-red-600 text-red-800 px-6 py-4 rounded-r-lg shadow-sm flex items-center animate-fade-in">
                <i class="fas fa-check-circle text-red-600 mr-3 text-xl"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                const icon = this.querySelector('i');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                }
            });
        }
    </script>
</body>
</html>
