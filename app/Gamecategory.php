<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamecategory extends Model
{
    protected $fillable = [
        'name', 'description',
    ];
}
