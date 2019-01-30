<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physicians extends Model
{
    protected $table = 'physicians';

    protected $fillable = [
        'name', 'phone'
    ];

    public $timestamps = false;
}
