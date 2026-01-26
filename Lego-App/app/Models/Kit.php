<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Kit extends Model
{
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    protected $fillable = ['number'];

    protected $rules = [
            'number' => 'required|integer|unique:kits,number',
        ];


    // Relation many-to-many entre Kits et Pieces via la table pivot kits_pieces (avec quantité)
    public function pieces()
    {
        return $this->belongsToMany(Piece::class, 'kits_pieces');
    }
}
