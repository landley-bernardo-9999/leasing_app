<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Resident extends Model
{
    protected $primaryKey = 'res_id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'res_type', 'res_full_name', 'res_email', 'res_mobile','res_country'
    ];

    public function bookings(){
        return $this->hasMany(App\Booking);
    }
    
     /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->res_id = (string) Uuid::generate(4);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'res_id';
    }

}
