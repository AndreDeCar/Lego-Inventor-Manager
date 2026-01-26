<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Box extends Model
{
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    protected $fillable = ['number', 'size', 'cupboard_id'];

    protected $rules = [
            'number' => 'required|integer|min:-32768|max:32767|unique:boxes,number',
            'size' => 'required|in:small,medium,big',
            'cupboard_id' => 'required|integer|exists:cupboards,id',
        ];

    public function cupboard()
    {
        return $this->belongsTo(Cupboard::class);
    }

    public function pieces()
    {
        return $this->hasMany(Piece::class);
    }
}
