<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physicians extends Model
{
    protected $table = 'physicians';

    protected $fillable = [
        'child_id', 'name', 'phone'
    ];

    public $timestamps = false;
}
