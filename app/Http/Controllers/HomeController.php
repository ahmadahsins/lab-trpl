<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Lab;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $dosens = Dosen::with('bidangKeahlians')
            ->withCount('proyeks')
            ->take(8)
            ->get();
            
        $labs = Lab::withCount(['proyeks', 'laborans'])
            ->take(6)
            ->get();
            
        return view('home', compact('dosens', 'labs'));
    }
}
