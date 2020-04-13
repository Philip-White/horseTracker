<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    //
    protected $table = 'horses';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
