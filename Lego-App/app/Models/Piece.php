<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Piece extends Model
{
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    protected $fillable = ['number', 'color', 'name', 'quantity', 'image_url'];

    protected $rules = [
            'number' => 'required|integer',
            'color' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'quantity' => 'required|integer',
            'image_url' => 'required|string|max:500|unique:pieces,image_url',
        ];
}
