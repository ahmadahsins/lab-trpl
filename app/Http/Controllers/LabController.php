<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the labs.
     */
    public function index()
    {
        $labs = Lab::withCount(['proyeks', 'laborans'])
            ->paginate(9);
            
        return view('lab.index', compact('labs'));
    }
    
    /**
     * Display the specified lab.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $lab = Lab::with(['laborans', 'proyeks.dosen', 'proyeks.mahasiswaProyeks'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('lab.show', compact('lab'));
    }
}
