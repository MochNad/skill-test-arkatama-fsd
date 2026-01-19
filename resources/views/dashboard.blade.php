@extends('layouts.app')

@section('title', 'Dashboard - PetCare+')

@section('content')
<div class="space-y-8">
    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-2xl p-8 text-white shadow-xl">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold mb-2">Welcome to PetCare+</h1>
                <p class="text-red-100 text-lg">Professional Pet Clinic Management System</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-heart-pulse text-white/20 text-9xl"></i>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Owners Card -->
        <div class="bg-white overflow-hidden shadow-xl rounded-2xl border border-red-100 transform hover:scale-105 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 p-4 shadow-lg">
                            <i class="fas fa-users text-white text-3xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Total Owners</dt>
                            <dd class="text-4xl font-bold text-gray-900 mt-1">{{ $stats['total_owners'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-blue-50 to-white px-6 py-4 border-t border-blue-100">
                <a href="{{ route('owners.index') }}" class="text-sm font-semibold text-blue-700 hover:text-blue-900 inline-flex items-center">
                    View all <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Pets Card -->
        <div class="bg-white overflow-hidden shadow-xl rounded-2xl border border-red-100 transform hover:scale-105 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-xl bg-gradient-to-br from-green-500 to-green-600 p-4 shadow-lg">
                            <i class="fas fa-paw text-white text-3xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Total Pets</dt>
                            <dd class="text-4xl font-bold text-gray-900 mt-1">{{ $stats['total_pets'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-green-50 to-white px-6 py-4 border-t border-green-100">
                <a href="{{ route('pets.index') }}" class="text-sm font-semibold text-green-700 hover:text-green-900 inline-flex items-center">
                    View all <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Treatments Card -->
        <div class="bg-white overflow-hidden shadow-xl rounded-2xl border border-red-100 transform hover:scale-105 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 p-4 shadow-lg">
                            <i class="fas fa-syringe text-white text-3xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Treatments</dt>
                            <dd class="text-4xl font-bold text-gray-900 mt-1">{{ $stats['total_treatments'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-amber-50 to-white px-6 py-4 border-t border-amber-100">
                <a href="{{ route('treatments.index') }}" class="text-sm font-semibold text-amber-700 hover:text-amber-900 inline-flex items-center">
                    View all <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>

        <!-- Checkups Card -->
        <div class="bg-white overflow-hidden shadow-xl rounded-2xl border border-red-100 transform hover:scale-105 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 p-4 shadow-lg">
                            <i class="fas fa-clipboard-check text-white text-3xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Total Checkups</dt>
                            <dd class="text-4xl font-bold text-gray-900 mt-1">{{ $stats['total_checkups'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-purple-50 to-white px-6 py-4 border-t border-purple-100">
                <a href="{{ route('checkups.index') }}" class="text-sm font-semibold text-purple-700 hover:text-purple-900 inline-flex items-center">
                    View all <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Checkups -->
    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-red-100">
        <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-5">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-history text-white text-2xl mr-3"></i>
                    <h2 class="text-2xl font-bold text-white">Recent Checkups</h2>
                </div>
                <a href="{{ route('checkups.index') }}" class="text-white hover:text-red-100 text-sm font-semibold inline-flex items-center">
                    View All <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-red-100">
                <thead class="bg-red-50">
                    <tr>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Pet Name</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Owner</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Treatment</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Date & Time</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-red-50">
                    @forelse($recentCheckups as $checkup)
                        <tr class="hover:bg-red-50 transition-colors duration-150">
                            <td class="px-8 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-paw text-white"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-900">{{ $checkup->pet->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $checkup->pet->type }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-gray-900">{{ $checkup->pet->owner->name }}</div>
                            </td>
                            <td class="px-8 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold
                                    @if($checkup->treatment->type == 'Vaksin') bg-blue-100 text-blue-800 border border-blue-200
                                    @elseif($checkup->treatment->type == 'Grooming') bg-green-100 text-green-800 border border-green-200
                                    @else bg-purple-100 text-purple-800 border border-purple-200 @endif">
                                    @if($checkup->treatment->type == 'Vaksin')<i class="fas fa-syringe mr-1"></i>
                                    @elseif($checkup->treatment->type == 'Grooming')<i class="fas fa-cut mr-1"></i>
                                    @else<i class="fas fa-stethoscope mr-1"></i>@endif
                                    {{ $checkup->treatment->name }}
                                </span>
                            </td>
                            <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-700">
                                <i class="fas fa-calendar-alt text-red-500 mr-2"></i>{{ $checkup->created_at->format('d M Y H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-clipboard-check text-red-200 text-6xl mb-4"></i>
                                    <p class="text-gray-500 font-semibold text-lg">No checkups yet</p>
                                    <p class="text-gray-400 text-sm mt-2">Start by creating your first checkup record</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
