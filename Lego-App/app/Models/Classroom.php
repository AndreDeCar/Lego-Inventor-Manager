<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Classroom extends Model
{
    // Validation des données selon les règles définies dans $rules
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    // Attributs pouvant être assignés
    protected $fillable = ['code', 'name', 'location'];

    // Données de validation alignées avec la base de données
    protected $rules = [
            'code' => 'required|integer|min:0|max:255|unique:classrooms,code',
            'name' => 'required|string|max:50|unique:classrooms,name',
            'location' => 'required|in:Yverdon-les-Bains,Ste-Croix',
        ];
}
