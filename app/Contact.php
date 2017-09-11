<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'group_id',
        'name',
        'company',
        'email',
        'phone',
        'address',
        'photo'
    ];
    
    public function group(){
       return $this->belongsTo('App\Group');
    }
}
