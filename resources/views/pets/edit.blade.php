@extends('layouts.app')

@section('title', 'Edit Pet')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <!-- Breadcrumb -->
    <div class="flex items-center text-sm text-gray-600">
        <a href="{{ route('pets.index') }}" class="hover:text-red-600 transition-colors flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Back to Pets
        </a>
    </div>

    <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-red-100">
        <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-6">
            <div class="flex items-center">
                <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl mr-4">
                    <i class="fas fa-edit text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Edit Pet</h2>
                    <p class="text-red-100 text-sm mt-1">Update pet information</p>
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

            <form action="{{ route('pets.update', $pet) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Owner Selection -->
                <div class="space-y-2">
                    <label for="owner_id" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-user-tie text-red-600 mr-2"></i>Pet Owner <span class="text-red-600">*</span>
                    </label>
                    <select name="owner_id" id="owner_id" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 bg-white shadow-sm">
                        @foreach($owners as $owner)
                            <option value="{{ $owner->id }}" {{ old('owner_id', $pet->owner_id) == $owner->id ? 'selected' : '' }}>
                                {{ $owner->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pet Information Input -->
                <div class="space-y-2">
                    <label for="pet_input" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-keyboard text-red-600 mr-2"></i>Pet Information (Single Input) <span class="text-red-600">*</span>
                    </label>
                    <input type="text" 
                           name="pet_input" 
                           id="pet_input" 
                           value="{{ old('pet_input', $pet->name . ' ' . $pet->type . ' ' . $pet->age . 'Th ' . $pet->weight . 'kg') }}"
                           placeholder="Example: Milo Kucing 2Th 4.5kg" 
                           required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 shadow-sm font-medium">
                    <p class="text-sm text-gray-600 mt-2 flex items-start">
                        <i class="fas fa-info-circle text-red-500 mr-2 mt-0.5"></i>
                        <span>Format: <strong class="text-red-700">NAMA JENIS USIA BERAT</strong></span>
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('pets.index') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 font-semibold shadow-sm hover:shadow transition-all duration-200">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        <i class="fas fa-save mr-2"></i>Update Pet
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
