<?php

namespace App\Http\Controllers\Admin;

use App\Models\Build;
use App\Models\Piece;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildPieceController extends Controller
{
    public function removePiece(Build $build, Piece $piece)
    {
        $build->pieces()->detach($piece->id);

        return redirect()
            ->route('admin.builds.show', $build->id);
    }
}
