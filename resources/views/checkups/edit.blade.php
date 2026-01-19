@extends('layouts.app')

@section('title', 'Edit Checkup')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <!-- Breadcrumb -->
    <div class="flex items-center text-sm text-gray-600">
        <a href="{{ route('checkups.index') }}" class="hover:text-red-600 transition-colors flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Back to Checkups
        </a>
    </div>

    <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-red-100">
        <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-6">
            <div class="flex items-center">
                <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl mr-4">
                    <i class="fas fa-edit text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white">Edit Checkup</h2>
                    <p class="text-red-100 text-sm mt-1">Update checkup information</p>
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

            <form action="{{ route('checkups.update', $checkup) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label for="pet_id" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-paw text-red-600 mr-2"></i>Select Pet <span class="text-red-600">*</span>
                    </label>
                    <select name="pet_id" id="pet_id" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 bg-white shadow-sm">
                        @foreach($pets as $pet)
                            <option value="{{ $pet->id }}" {{ old('pet_id', $checkup->pet_id) == $pet->id ? 'selected' : '' }}>
                                {{ $pet->name }} ({{ $pet->type }}) - Owner: {{ $pet->owner->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="treatment_id" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-syringe text-red-600 mr-2"></i>Select Treatment <span class="text-red-600">*</span>
                    </label>
                    <select name="treatment_id" id="treatment_id" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 bg-white shadow-sm">
                        @foreach($treatments as $treatment)
                            <option value="{{ $treatment->id }}" {{ old('treatment_id', $checkup->treatment_id) == $treatment->id ? 'selected' : '' }}>
                                {{ $treatment->name }} ({{ $treatment->type }}) - Rp {{ number_format($treatment->price, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="notes" class="block text-sm font-semibold text-gray-700">
                        <i class="fas fa-notes-medical text-red-600 mr-2"></i>Medical Notes
                    </label>
                    <textarea name="notes" id="notes" rows="5"
                              placeholder="Enter any medical notes, observations, or recommendations..."
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 shadow-sm resize-none">{{ old('notes', $checkup->notes) }}</textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('checkups.index') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-gray-700 bg-white hover:bg-gray-50 font-semibold shadow-sm hover:shadow transition-all duration-200">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </a>
                    <button type="submit" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                        <i class="fas fa-save mr-2"></i>Update Checkup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
