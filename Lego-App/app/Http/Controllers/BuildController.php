<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    public function index()
    {
        return view('builds.index', ['builds' => Build::all()]);
    }

    public function show (Build $build)
    {
        return view('builds.show', ['build' => $build]);
    }
}
