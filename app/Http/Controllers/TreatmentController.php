<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::latest()->paginate(10);
        return view('treatments.index', compact('treatments'));
    }

    public function create()
    {
        return view('treatments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:Vaksin,Grooming,Pemeriksaan',
        ]);

        Treatment::create($request->all());
        return redirect()->route('treatments.index')->with('success', 'Treatment berhasil ditambahkan!');
    }

    public function show(Treatment $treatment)
    {
        $treatment->load('checkups.pet.owner');
        return view('treatments.show', compact('treatment'));
    }

    public function edit(Treatment $treatment)
    {
        return view('treatments.edit', compact('treatment'));
    }

    public function update(Request $request, Treatment $treatment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:Vaksin,Grooming,Pemeriksaan',
        ]);

        $treatment->update($request->all());
        return redirect()->route('treatments.index')->with('success', 'Treatment berhasil diupdate!');
    }

    public function destroy(Treatment $treatment)
    {
        $treatment->delete();
        return redirect()->route('treatments.index')->with('success', 'Treatment berhasil dihapus!');
    }
}
