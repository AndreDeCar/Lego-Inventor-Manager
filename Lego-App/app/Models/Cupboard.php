<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Cupboard extends Model
{
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    protected $fillable = ['number'];

    protected $rules = [
            'number' => 'required|string|max:4|unique:cupboards,number',
        ];
}
