<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'room_no', 'site', 'building', 'floor_no','room_wing','room_status','room_size','type_of_bed','no_of_bed','short_term_rent','long_term_rent','transient_rent','room_description'
    ];


    public function owners(){
        return $this->hasMany(App\Owner);
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->room_id = (string) Uuid::generate(4);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'room_id';
    }

}
