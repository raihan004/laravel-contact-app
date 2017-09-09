<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function contacts(){
        return $this->hasMany('App\Contact'); // it assume forgein_key gorup_id by default
    }
}
