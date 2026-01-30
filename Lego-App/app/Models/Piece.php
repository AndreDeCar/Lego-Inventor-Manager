<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Piece extends Model
{
    // Validation des données selon les règles définies dans $rules
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    public $timestamps = false;

    // Attributs pouvant être assignés
    protected $fillable = ['number', 'color', 'name', 'quantity', 'image_url', 'box_id'];

    // Données de validation alignées avec la base de données
    protected $rules = [
            'number' => 'required|integer',
            'color' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'quantity' => 'required|integer',
            'image_url' => 'required|string|max:500|unique:pieces,image_url',
            'box_id' => 'required|integer|exists:boxes,id',
        ];

    // Chaque type de piece appartient à une seule box    
    public function box() 
    {
        return $this->belongsTo(Box::class);
    }

    // Relation many-to-many entre Pieces et Kits via la table pivot kits_pieces
    public function kits()
    {
        return $this->belongsToMany(Kit::class, 'kits_pieces');
    }

    // Relation many-to-many entre Pieces et Builds via la table pivot kits_pieces (avec quantité)
    public function builds()
    {
        return $this->belongsToMany(Build::class, 'builds_pieces')->withPivot('quantity');
    }
}
