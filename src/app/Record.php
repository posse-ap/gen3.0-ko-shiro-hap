<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'records';

    protected $fillable =
    [
        'study_time',
        'study_date',
        'language_id',
        'content_id'
    ];

    //リレーション名
    public function languages() {
        return $this->hasMany('App\Language');
    }

    public function contents() {
        return $this->hasMany('App\Content');
    }
}
