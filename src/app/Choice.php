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


    public function question(){
        return $this->belongsTo('App\Question');
    }


    public $timestamps = false;
}