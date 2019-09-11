<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Uuid;

class Billing extends Model
{
    protected $primaryKey = 'pay_id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'desc', 'bil_amt' ,'bil_id_foreign'
    ];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->bil_id = (string) Uuid::generate(4);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'bil_id';
    }
}
