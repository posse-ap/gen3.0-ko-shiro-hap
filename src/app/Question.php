<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable =
    [
        'question',
        'image'
    ];

//リレーション名
    public function choices() {
        return $this->hasMany('App\Choice');
    }

    public function notes() {
        return $this->hasMany('App\Note');
    }


    public $timestamps = false;
}