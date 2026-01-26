<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Build extends Model
{
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    protected $fillable = ['name', 'image_url'];

    protected $rules = [
            'name' => 'required|string|max:100|unique:builds,name',
            'image_url' => 'required|string|max:500',
        ];

    public function pieces()
    {
        return $this->belongsToMany(Piece::class, 'builds_pieces')->withPivot('quantity');
    }
}
