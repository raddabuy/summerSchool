<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Session extends Model
{
    public $table = 'sessions';

    public $fillable = [
        'sum',
        'details',
        'sessionId'
    ];

}
