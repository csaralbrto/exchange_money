<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    //
    protected $table = 'purchase';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount', 'id_account', 'id_user', 'dayli_rate', 'date'
    ];
}
