<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = 'choices';

    protected $fillable =
    [
        'choice'
    ];


    public $timestamps = false;
}
