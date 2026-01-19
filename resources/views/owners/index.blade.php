@extends('layouts.app')

@section('title', 'Owners List')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Owners Management</h1>
            <p class="mt-1 text-sm text-gray-600">Manage all pet owners in the system</p>
        </div>
        <a href="{{ route('owners.create') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
            <i class="fas fa-user-plus mr-2"></i>Add New Owner
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-red-100">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-red-100">
                <thead class="bg-gradient-to-r from-red-600 to-red-700">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Actions</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Address</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Pets</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-red-50">
                    @forelse($owners as $index => $owner)
                        <tr class="hover:bg-red-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">{{ ($owners->currentPage() - 1) * $owners->perPage() + $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('owners.edit', $owner) }}" class="inline-flex items-center justify-center w-9 h-9 bg-gradient-to-br from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-110 transition-all duration-200" title="Edit">
                                        <i class="fas fa-edit text-sm"></i>
                                    </a>
                                    <form action="{{ route('owners.destroy', $owner) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this owner?')" class="inline-flex items-center justify-center w-9 h-9 bg-gradient-to-br from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-110 transition-all duration-200" title="Delete">
                                            <i class="fas fa-trash-alt text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $owner->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                @if($owner->phone)
                                    <span class="inline-flex items-center">
                                        <i class="fas fa-phone-alt text-red-500 mr-2 text-xs"></i>{{ $owner->phone }}
                                    </span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 max-w-xs truncate">{{ Str::limit($owner->address ?? '-', 50) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800 border border-red-200">
                                    <i class="fas fa-paw mr-1"></i>{{ $owner->pets_count }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-users text-red-200 text-5xl mb-4"></i>
                                    <p class="text-gray-500 font-medium">No owners found</p>
                                    <p class="text-gray-400 text-sm mt-1">Start by adding your first owner</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($owners->hasPages())
        <div class="px-6 py-4 bg-red-50 border-t border-red-100">
            {{ $owners->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
