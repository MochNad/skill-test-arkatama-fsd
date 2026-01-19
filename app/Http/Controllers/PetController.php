<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with('owner')->latest()->paginate(10);
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        $owners = Owner::all();
        return view('pets.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'pet_input' => 'required|string',
        ]);

        $input = trim($request->pet_input);
        
        if (!preg_match('/([\d,\.]+)\s*kg$/i', $input, $weightMatch)) {
            return back()->withErrors(['pet_input' => 'Format berat tidak valid. Harus diakhiri dengan angka + "kg" (contoh: 4.5kg)'])->withInput();
        }
        $weight = (float)str_replace(',', '.', $weightMatch[1]);
        $remaining = trim(substr($input, 0, strrpos($input, $weightMatch[0])));
        
        if (!preg_match('/(\d+)\s*(?:th|thn|tahun)$/i', $remaining, $ageMatch)) {
            return back()->withErrors(['pet_input' => 'Format usia tidak valid. Harus mengandung angka + "th/thn/tahun" (contoh: 2th)'])->withInput();
        }
        $age = (int)$ageMatch[1];
        $remaining = trim(substr($remaining, 0, strrpos($remaining, $ageMatch[0])));
        
        $parts = preg_split('/\s+/', $remaining);
        if (count($parts) < 2) {
            return back()->withErrors(['pet_input' => 'Format tidak valid. Minimal harus ada NAMA dan JENIS (contoh: Milo Kucing 2th 4.5kg)'])->withInput();
        }
        
        $type = strtoupper(array_pop($parts));
        $name = strtoupper(implode(' ', $parts));

        $exists = Pet::where('owner_id', $request->owner_id)
                     ->where('name', $name)
                     ->where('type', $type)
                     ->exists();

        if ($exists) {
            return back()->withErrors(['pet_input' => 'Pet dengan nama dan jenis yang sama sudah terdaftar untuk pemilik ini.'])->withInput();
        }

        $now = now();
        $hour = $now->format('H');
        $minute = $now->format('i');
        $ownerIdPadded = str_pad($request->owner_id, 4, '0', STR_PAD_LEFT);
        
        $todayStart = $now->copy()->startOfDay();
        $sequence = Pet::where('owner_id', $request->owner_id)
                       ->where('created_at', '>=', $todayStart)
                       ->count() + 1;
        $sequencePadded = str_pad($sequence, 4, '0', STR_PAD_LEFT);
        
        $uniqueCode = $hour . $minute . $ownerIdPadded . $sequencePadded;

        Pet::create([
            'owner_id' => $request->owner_id,
            'unique_code' => $uniqueCode,
            'name' => $name,
            'type' => $type,
            'age' => $age,
            'weight' => $weight,
        ]);

        return redirect()->route('pets.index')->with('success', 'Pet berhasil ditambahkan!');
    }

    public function show(Pet $pet)
    {
        $pet->load('owner', 'checkups.treatment');
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        $owners = Owner::all();
        return view('pets.edit', compact('pet', 'owners'));
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'pet_input' => 'required|string',
        ]);

        $input = trim($request->pet_input);
        
        if (!preg_match('/([\d,\.]+)\s*kg$/i', $input, $weightMatch)) {
            return back()->withErrors(['pet_input' => 'Format berat tidak valid. Harus diakhiri dengan angka + "kg"'])->withInput();
        }
        $weight = (float)str_replace(',', '.', $weightMatch[1]);
        $remaining = trim(substr($input, 0, strrpos($input, $weightMatch[0])));
        
        if (!preg_match('/(\d+)\s*(?:th|thn|tahun)$/i', $remaining, $ageMatch)) {
            return back()->withErrors(['pet_input' => 'Format usia tidak valid. Harus mengandung angka + "th/thn/tahun"'])->withInput();
        }
        $age = (int)$ageMatch[1];
        $remaining = trim(substr($remaining, 0, strrpos($remaining, $ageMatch[0])));
        
        $parts = preg_split('/\s+/', $remaining);
        if (count($parts) < 2) {
            return back()->withErrors(['pet_input' => 'Format tidak valid. Minimal harus ada NAMA dan JENIS'])->withInput();
        }
        
        $type = strtoupper(array_pop($parts));
        $name = strtoupper(implode(' ', $parts));

        $exists = Pet::where('owner_id', $request->owner_id)
                     ->where('name', $name)
                     ->where('type', $type)
                     ->where('id', '!=', $pet->id)
                     ->exists();

        if ($exists) {
            return back()->withErrors(['pet_input' => 'Pet dengan nama dan jenis yang sama sudah terdaftar.'])->withInput();
        }

        $pet->update([
            'owner_id' => $request->owner_id,
            'name' => $name,
            'type' => $type,
            'age' => $age,
            'weight' => $weight,
        ]);

        return redirect()->route('pets.index')->with('success', 'Pet berhasil diupdate!');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet berhasil dihapus!');
    }
}
