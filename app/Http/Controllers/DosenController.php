<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the dosens.
     */
    public function index()
    {
        $dosens = Dosen::with('bidangKeahlians')->get();
        return view('dosens.index', compact('dosens'));
    }

    /**
     * Display the specified dosen.
     */
    public function show(Dosen $dosen)
    {
        // Load related data as specified in PRD
        $dosen->load([
            'bidangKeahlians', 
            'proyeks', 
            'mahasiswaProyeks'
        ]);
        
        return view('dosens.show', compact('dosen'));
    }
}
