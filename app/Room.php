<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'room_no', 'enrollment_date', 'site', 'building', 'floor_no','room_wing','room_status','room_size','type_of_bed','short_term_rent','long_term_rent','transient_rent','room_description','own_id_foreign'
    ];


    public function user(){
        return $this->belongsTo(App\User);
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
