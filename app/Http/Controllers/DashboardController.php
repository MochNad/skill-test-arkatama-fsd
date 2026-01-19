<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Owner;
use App\Models\Pet;
use App\Models\Treatment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_owners' => Owner::count(),
            'total_pets' => Pet::count(),
            'total_treatments' => Treatment::count(),
            'total_checkups' => Checkup::count(),
        ];

        $recentCheckups = Checkup::with(['pet.owner', 'treatment'])
                                 ->latest()
                                 ->take(5)
                                 ->get();

        return view('dashboard', compact('stats', 'recentCheckups'));
    }
}
