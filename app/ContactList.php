<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactList extends Model
{
    protected $table = 'contact_list';

    protected $fillable = [
        'child_id', 'first_name', 'last_name', 'phone', 'address', 'relation'
    ];

    public $timestamps = false;
}
