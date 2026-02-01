<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kits.index', ['kits' => Kit::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kit::create($request->all());

        return redirect()->route('admin.kits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kit $kit)
    {
        return view('admin.kits.show', ['kit' => $kit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kit $kit)
    {
        $kit->pieces()->detach();

        $kit->delete();

        return redirect()->route('admin.kits.index');
    }
}
