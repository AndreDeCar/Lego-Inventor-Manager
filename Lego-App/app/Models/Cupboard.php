<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Cupboard extends Model
{
    // Validation des données selon les règles définies dans $rules
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    public $timestamps = false;

    // Attributs pouvant être assignés
    protected $fillable = ['number', 'classroom_id'];

    // Données de validation alignées avec la base de données
    protected $rules = [
            'number' => 'required|string|max:4|unique:cupboards,number',
            'classroom_id' => 'required|integer|exists:classrooms,id',
        ];

    // Une armoire peut contenir plusieurs boxes    
    public function boxes()
    {
        return $this->hasMany(Box::class);
    }

    // Chaque armoire appartient à une seule classroom
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
