<?php

namespace App\Http\Controllers\Admin;

use App\Models\Build;
use App\Models\Piece;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.builds.index', ['builds' => Build::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.builds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Build::create($request->all());

        return redirect()->route('admin.builds.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Build $build)
    {
        $pieces = Piece::all();

        return view('admin.builds.show', compact('build', 'pieces'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(Build $build)
    {
        $build->pieces()->detach();

        $build->delete();

        return redirect()->route('admin.builds.index');
    }

    public function addPiece(Request $request, Build $build)
    {
    $data = $request->validate([
        'piece_id' => 'required|exists:pieces,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $existing = $build->pieces()->where('piece_id', $data['piece_id'])->first();
    if ($existing) {
        $build->pieces()->updateExistingPivot($data['piece_id'], ['quantity' => $data['quantity']]);
    } else {
        $build->pieces()->attach($data['piece_id'], ['quantity' => $data['quantity']]);
    }

    return redirect()->route('admin.builds.show', $build->id);

    }
    public function attachPiece(Request $request, Build $build)
    {
    $data = $request->validate([
        'piece_id' => 'required|exists:pieces,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $build->pieces()->attach($data['piece_id'], ['quantity' => $data['quantity']]);

    return redirect()->route('admin.builds.show', $build->id)
                     ->with('success', 'Pièce ajoutée au build !');
    }

    public function showAddPieceForm(Build $build)
    {
    $pieces = Piece::all();
    return view('admin.builds.add_piece', compact('build', 'pieces'));
    }

}