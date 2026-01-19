@extends('layouts.app')

@section('title', 'Edit Owner')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <!-- Breadcrumb -->
    <div class="flex items-center text-sm text-gray-600">
        <a href="{{ route('owners.index') }}" class="hover:text-red-600 transition-colors flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Back to Owners
        </a>
    </div>

    <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-red-100">
        <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-6">
            <div class="flex items-center">
                <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl mr-4">
                    <i class="fas fa-user-edit text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Edit Owner</h2>
                    <p class="text-red-100 text-sm mt-1">Update owner information</p>
                </div>
            </div>
        </div>

        <div class="p-8">
            @if($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-600 text-red-800 px-6 py-4 rounded-r-lg">
                    <div class="flex items-start">
                        <i class="fas fa-exclamation-circle text-red-600 mt-0.5 mr-3"></i>
                        <div>
                            <p class="font-semibold mb-2">Please fix the following errors:</p>
                            <ul class="list-disc list-inside space-y-1 text-sm">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('owners.update', $owner) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label for="name" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-user text-red-600 mr-2"></i>Owner Name <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $owner->name) }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 shadow-sm">
                </div>

                <div class="space-y-2">
                    <label for="phone" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-phone text-red-600 mr-2"></i>Phone Number
                    </label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $owner->phone) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 shadow-sm">
                </div>

                <div class="space-y-2">
                    <label for="address" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-map-marker-alt text-red-600 mr-2"></i>Address
                    </label>
                    <textarea name="address" id="address" rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 shadow-sm resize-none">{{ old('address', $owner->address) }}</textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('owners.index') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 font-semibold shadow-sm hover:shadow transition-all duration-200">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        <i class="fas fa-save mr-2"></i>Update Owner
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
