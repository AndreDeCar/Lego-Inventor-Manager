<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Cupboard extends Model
{
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    protected $fillable = ['number', 'classroom_id'];

    protected $rules = [
            'number' => 'required|string|max:4|unique:cupboards,number',
            'classroom_id' => 'required|integer|exists:classrooms,id',
        ];

    public function boxes()
    {
        return $this->hasMany(Box::class);
    }
}
