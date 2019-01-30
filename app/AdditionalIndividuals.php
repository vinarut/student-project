<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalIndividuals extends Model
{
    protected $table = 'additional_individuals';

    protected $fillable = [
        'child_id', 'name', 'phone'
    ];

    public $timestamps = false;
}
