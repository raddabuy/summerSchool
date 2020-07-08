<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    public $table = 'transaction';

    public $fillable = [
        'card_number',
        'cvc',
        'dates',
        'status',
        'session_id'
    ];

}
