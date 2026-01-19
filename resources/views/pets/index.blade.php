@extends('layouts.app')

@section('title', 'Pets List')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Pets Management</h1>
            <p class="mt-1 text-sm text-gray-600">Manage all registered pets in the system</p>
        </div>
        <a href="{{ route('pets.create') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
            <i class="fas fa-plus-circle mr-2"></i>Add New Pet
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-red-100">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-red-100">
                <thead class="bg-gradient-to-r from-red-600 to-red-700">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Actions</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Unique Code</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Type</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Age</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Weight</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Owner</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-red-50">
                    @forelse($pets as $index => $pet)
                        <tr class="hover:bg-red-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">{{ ($pets->currentPage() - 1) * $pets->perPage() + $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('pets.edit', $pet) }}" class="inline-flex items-center justify-center w-9 h-9 bg-gradient-to-br from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-110 transition-all duration-200" title="Edit">
                                        <i class="fas fa-edit text-sm"></i>
                                    </a>
                                    <form action="{{ route('pets.destroy', $pet) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this pet?')" class="inline-flex items-center justify-center w-9 h-9 bg-gradient-to-br from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-110 transition-all duration-200" title="Delete">
                                            <i class="fas fa-trash-alt text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-mono font-semibold bg-red-100 text-red-800 border border-red-200">
                                    {{ $pet->unique_code }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $pet->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $pet->type }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $pet->age }} <span class="text-gray-500">th</span></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $pet->weight }} <span class="text-gray-500">kg</span></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $pet->owner->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-paw text-red-200 text-5xl mb-4"></i>
                                    <p class="text-gray-500 font-medium">No pets found</p>
                                    <p class="text-gray-400 text-sm mt-1">Start by adding your first pet</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($pets->hasPages())
        <div class="px-6 py-4 bg-red-50 border-t border-red-100">
            {{ $pets->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
