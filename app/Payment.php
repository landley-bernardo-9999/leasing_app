<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Uuid;

class Payment extends Model
{
    protected $primaryKey = 'pay_id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
         'amt_paid','form_of_pay', 'or_number', 'ar_number', 'bank_name', 'check_no', 'date_dep', 'res_id_foreign', 'desc'
    ];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->pay_id = (string) Uuid::generate(4);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'pay_id';
    }

}
