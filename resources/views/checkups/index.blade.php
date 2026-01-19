@extends('layouts.app')

@section('title', 'Checkups List')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Checkups Management</h1>
            <p class="mt-1 text-sm text-gray-600">Track all pet medical checkups and treatments</p>
        </div>
        <a href="{{ route('checkups.create') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
            <i class="fas fa-plus-circle mr-2"></i>Add New Checkup
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-red-100">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-red-100">
                <thead class="bg-gradient-to-r from-red-600 to-red-700">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Actions</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Pet Name</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Owner</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Treatment</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Notes</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-red-50">
                    @forelse($checkups as $index => $checkup)
                        <tr class="hover:bg-red-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">{{ ($checkups->currentPage() - 1) * $checkups->perPage() + $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('checkups.edit', $checkup) }}" class="inline-flex items-center justify-center w-9 h-9 bg-gradient-to-br from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-110 transition-all duration-200" title="Edit">
                                        <i class="fas fa-edit text-sm"></i>
                                    </a>
                                    <form action="{{ route('checkups.destroy', $checkup) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this checkup?')" class="inline-flex items-center justify-center w-9 h-9 bg-gradient-to-br from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-lg shadow-md hover:shadow-lg transform hover:scale-110 transition-all duration-200" title="Delete">
                                            <i class="fas fa-trash-alt text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                <span class="inline-flex items-center">
                                    <i class="fas fa-paw text-red-500 mr-2 text-xs"></i>{{ $checkup->pet->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $checkup->pet->owner->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold
                                    @if($checkup->treatment->type == 'Vaksin') bg-blue-100 text-blue-800 border border-blue-200
                                    @elseif($checkup->treatment->type == 'Grooming') bg-green-100 text-green-800 border border-green-200
                                    @else bg-purple-100 text-purple-800 border border-purple-200 @endif">
                                    {{ $checkup->treatment->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 max-w-xs truncate">{{ Str::limit($checkup->notes ?? '-', 40) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <span class="inline-flex items-center">
                                    <i class="fas fa-calendar-alt text-red-500 mr-2 text-xs"></i>{{ $checkup->created_at->format('d M Y') }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-clipboard-check text-red-200 text-5xl mb-4"></i>
                                    <p class="text-gray-500 font-medium">No checkups found</p>
                                    <p class="text-gray-400 text-sm mt-1">Start by adding your first checkup record</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($checkups->hasPages())
        <div class="px-6 py-4 bg-red-50 border-t border-red-100">
            {{ $checkups->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
