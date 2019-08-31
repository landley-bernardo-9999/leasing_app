<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $primaryKey = 'resident_id';

    public $incrementing = false;

    protected $fillable = [
        'type_of_resident', 'birthdate', 'gender', 'civil_status'
    ];

    public function user(){
        return $this->belongsTo(App\User);
    }

    public function rooms(){
        return $this->hasMany(App\Room);
    }

}
