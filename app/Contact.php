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

    public function location($value = null){
        $photo = $value ? $value : $this->attributes['photo'];
        if($photo == 'default.png'){
            $path = "/{$photo}";
        }else{
            $path = config('uploads.path.uploads_path') . $photo;
        }
        return  $path;
    }
}
