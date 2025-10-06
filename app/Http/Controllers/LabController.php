<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display the specified lab.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $lab = Lab::with(['laborans', 'proyeks.dosen'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('lab.show', compact('lab'));
    }
}
