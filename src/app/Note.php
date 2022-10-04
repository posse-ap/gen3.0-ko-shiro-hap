<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';

    protected $fillable =
    [
        'note'
    ];

    public function questions (){
        return $this->belongsTo('App\Question');
    }

    public $timestamps = false;
}