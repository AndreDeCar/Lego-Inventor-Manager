<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Kit extends Model
{
    // Validation des données selon les règles définies dans $rules
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    // Attributs pouvant être assignés
    protected $fillable = ['number'];

    public $timestamps = false;

    // Données de validation alignées avec la base de données
    protected $rules = [
            'number' => 'required|integer|unique:kits,number',
        ];


    // Relation many-to-many entre Kits et Pieces via la table pivot kits_pieces
    public function pieces()
    {
        return $this->belongsToMany(Piece::class, 'kits_pieces');
    }
}
