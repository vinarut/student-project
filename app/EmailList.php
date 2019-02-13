<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EmailList extends Model
{
    use Notifiable;

    protected $table = 'email_lists';

    protected $fillable = [
        'email'
    ];
}
