<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Box extends Model
{
    // Validation des données selon les règles définies dans $rules
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    public $timestamps = false;

    // Attributs pouvant être assignés
    protected $fillable = ['number', 'size', 'cupboard_id'];

    // Données de validation alignées avec la base de données
    protected $rules = [
            'number' => 'required|integer|min:-32768|max:32767|unique:boxes,number',
            'size' => 'required|in:small,medium,big',
            'cupboard_id' => 'required|integer|exists:cupboards,id',
        ];


    // Chaque box appartient à un seul cupboard
    public function cupboard()
    {
        return $this->belongsTo(Cupboard::class);
    }

    // Une box peut contenir plusieurs pièces
    public function pieces()
    {
        return $this->hasMany(Piece::class);
    }
}
