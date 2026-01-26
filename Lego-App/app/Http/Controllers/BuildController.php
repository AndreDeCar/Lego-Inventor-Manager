<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    // Affiche la liste de tous les montages
    public function index()
    {
        return view('builds.index', ['builds' => Build::all()]);
    }

    // affiche les détails d'un montage spécifique
    public function show (Build $build)
    {
        return view('builds.show', ['build' => $build]);
    }
}
