<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposer extends Model
{
    protected $fillable = [
        'user_name', 'user_full_name', 'user_email', 'user_phone',
    ];
}
