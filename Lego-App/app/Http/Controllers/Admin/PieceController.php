<?php

namespace App\Http\Controllers\Admin;

use App\Models\Piece;
use App\Models\Kit;
use App\Models\Box;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kit_id = request()->query('kit_id');
        $kit = Kit::find($kit_id);

        $boxes = Box::all();

        return view('admin.pieces.create', compact('kit', 'boxes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'number' => 'required|string',
        'name' => 'required|string',
        'color' => 'required|string',
        'quantity' => 'required|integer',
        'image_url' => 'nullable|string',
        'box_id' => 'required|exists:boxes,id',
        'kit_id' => 'required|exists:kits,id',
    ]);

        $kit = Kit::findOrFail($data['kit_id']);

        unset($data['kit_id']);

        $piece = Piece::create($data);

        $kit->pieces()->attach($piece->id);

        return redirect()->route('admin.kits.show', $kit->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Piece $piece)
    {
        $kit = $piece->kits->first();

        $boxes = Box::all();

        return view('admin.pieces.edit', compact('piece', 'kit', 'boxes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Piece $piece)
    {
        $data = $request->validate([
            'number' => 'required|string',
            'name' => 'required|string',
            'color' => 'required|string',
            'quantity' => 'required|integer',
            'image_url' => 'nullable|string',
            'box_id' => 'required|exists:boxes,id',
            'kit_id' => 'required|exists:kits,id',
        ]);

        $piece->update($data);

        $kit = $piece->kits->first();

        return redirect()->route('admin.kits.show', $kit->id);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Piece $piece)
    {
        $kits = $piece->kits;

        $piece->kits()->detach();

        $piece->delete();

        if ($kits->isNotEmpty()) 
    {
        return redirect()->route('admin.kits.show', $kits->first()->id);
    }

        return redirect()->route('admin.kits.index');
    }
}
