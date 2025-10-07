<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\BidangKeahlian;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the dosens.
     */
    public function index(Request $request)
    {
        $query = Dosen::with('bidangKeahlians')
            ->withCount(['proyeks', 'mahasiswaProyeks']);
            
        // Filter by jabatan if provided
        if ($request->filled('jabatan')) {
            $query->where('jabatan', $request->jabatan);
        }
        
        // Filter by bidang keahlian if provided
        if ($request->filled('bidang_keahlian')) {
            $query->whereHas('bidangKeahlians', function($q) use ($request) {
                $q->where('bidang_keahlian_id', $request->bidang_keahlian);
            });
        }
        
        $dosens = $query->paginate(12);
        $bidangKeahlians = BidangKeahlian::orderBy('nama_bidang')->get();
        
        return view('dosens.index', compact('dosens', 'bidangKeahlians'));
    }

    /**
     * Display the specified dosen.
     */
    public function show(Dosen $dosen)
    {
        // Load related data as specified in PRD
        $dosen->load([
            'bidangKeahlians', 
            'proyeks.mahasiswaProyeks', 
            'proyeks.lab',
            'mahasiswaProyeks.proyeks'
        ]);
        
        return view('dosens.show', compact('dosen'));
    }
}
