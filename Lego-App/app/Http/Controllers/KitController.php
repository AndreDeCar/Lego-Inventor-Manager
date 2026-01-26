<?php

namespace App\Http\Controllers;

use App\Models\Kit;
use Illuminate\Http\Request;

class KitController extends Controller
{
    public function index()
    {
        return view('kits.index', ['kits' => Kit::all()]);
    }

    public function show (Kit $kit)
    {
        return view('kits.show', ['kit' => $kit]);
    }
}
