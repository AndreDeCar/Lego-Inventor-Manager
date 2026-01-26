<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Build extends Model
{
    // Validation des données selon les règles définies dans $rules
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    // Attributs pouvant être assignés
    protected $fillable = ['name', 'image_url'];

    // Données de validation alignées avec la base de données
    protected $rules = [
            'name' => 'required|string|max:100|unique:builds,name',
            'image_url' => 'required|string|max:500',
        ];

    // Relation many-to-many entre Builds et Pieces via la table pivot kits_pieces (avec quantité)    
    public function pieces()
    {
        return $this->belongsToMany(Piece::class, 'builds_pieces')->withPivot('quantity');
    }
}
