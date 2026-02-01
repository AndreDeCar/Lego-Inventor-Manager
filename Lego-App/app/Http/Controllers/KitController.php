<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use Illuminate\Http\Request;

class KitController extends Controller
{
    // Affiche la liste de tous les kits
    public function index()
    {
        return view('kits.index', ['kits' => Kit::all()]);
    }

    // affiche les détails d'un kit spécifique
    public function show (Kit $kit)
    {
        return view('kits.show', ['kit' => $kit]);
    }
}
