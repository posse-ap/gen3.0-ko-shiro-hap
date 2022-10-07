<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable =
    [
        'language'
    ];

    public function records (){
        return $this->belongsTo('App\Record');
    }
}
