<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Classroom extends Model
{
    use ValidatingTrait;

    protected $throwValidationExceptions = true;

    protected $fillable = ['code', 'name', 'location'];

    protected $rules = [
            'code' => 'required|integer|min:0|max:255|unique:classrooms,code',
            'name' => 'required|string|max:50|unique:classrooms,name',
            'location' => 'required|in:Yverdon-les-Bains,Ste-Croix',
        ];
}
