<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactList extends Model
{
    protected $table = 'contact_list';

    protected $fillable = [
        'child_id', 'name', 'phone', 'address', 'relation'
    ];

    public $timestamps = false;
}
