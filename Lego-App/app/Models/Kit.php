<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Kit extends Model
{
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    protected $fillable = ['number'];

    protected $rules = [
            'number' => 'required|integer|unique:kits,number',
        ];

    public function pieces()
    {
        return $this->belongsToMany(Piece::class, 'kits_pieces')->withPivot('quantity');
    }
}
