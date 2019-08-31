<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $primaryKey = 'owner_id';

    protected $fillable = [
         'birthdate', 'gender', 'civil_status'
    ];

    public function user(){
        return $this->belongsTo(App\User);
    }

    public function rooms(){
        return $this->hasMany(App\Room);
    }
}
