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


    public function questions() {
        return $this->belongsTo('App\Question');
    }


    public $timestamps = false;
}
