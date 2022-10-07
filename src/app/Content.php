<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    protected $fillable =
    [
        'content'
    ];

    public function records (){
        return $this->belongsTo('App\Record');
    }
}
