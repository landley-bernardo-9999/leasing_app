<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Uuid;

class Remittance extends Model
{
    protected $primaryKey = 'rem_id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
         'rem_amt', 'date_dep', 'rem_own_id_foreign', 'rem_pay_id_foreign'
    ];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->rem_id = (string) Uuid::generate(4);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'rem_id';
    }
}
