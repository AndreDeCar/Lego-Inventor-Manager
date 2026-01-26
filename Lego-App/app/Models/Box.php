<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Box extends Model
{
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    protected $fillable = ['number', 'size'];

    protected $rules = [
            'number' => 'required|integer|min:-32768|max:32767|unique:boxes,number',
            'size' => 'required|in:small,medium,big',
        ];

    public function cupboard()
    {
        return $this->belongsTo(Cupboard::class);
    }
}
