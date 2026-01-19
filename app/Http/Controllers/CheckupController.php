<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Pet;
use App\Models\Treatment;
use Illuminate\Http\Request;

class CheckupController extends Controller
{
    public function index()
    {
        $checkups = Checkup::with(['pet.owner', 'treatment'])->latest()->paginate(10);
        return view('checkups.index', compact('checkups'));
    }

    public function create()
    {
        $pets = Pet::with('owner')->get();
        $treatments = Treatment::all();
        return view('checkups.create', compact('pets', 'treatments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'treatment_id' => 'required|exists:treatments,id',
            'notes' => 'nullable|string',
        ]);

        Checkup::create($request->all());
        return redirect()->route('checkups.index')->with('success', 'Checkup berhasil ditambahkan!');
    }

    public function show(Checkup $checkup)
    {
        $checkup->load('pet.owner', 'treatment');
        return view('checkups.show', compact('checkup'));
    }

    public function edit(Checkup $checkup)
    {
        $pets = Pet::with('owner')->get();
        $treatments = Treatment::all();
        return view('checkups.edit', compact('checkup', 'pets', 'treatments'));
    }

    public function update(Request $request, Checkup $checkup)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'treatment_id' => 'required|exists:treatments,id',
            'notes' => 'nullable|string',
        ]);

        $checkup->update($request->all());
        return redirect()->route('checkups.index')->with('success', 'Checkup berhasil diupdate!');
    }

    public function destroy(Checkup $checkup)
    {
        $checkup->delete();
        return redirect()->route('checkups.index')->with('success', 'Checkup berhasil dihapus!');
    }
}
