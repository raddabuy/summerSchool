<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class PaymentSession extends Model
{
    public $table = 'sessions';

    public $fillable = [
        'sum',
        'details',
        'sessionId'
    ];

}
