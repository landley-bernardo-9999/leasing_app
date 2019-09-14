<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Uuid;

class Guardian extends Model
{
    protected $primaryKey = 'guardian_id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'guardian_name', 'relationship', 'guardian_mobile', 'guardian_email', 'res_guar_foreign_id'
    ];

    public function resident(){
        return $this->belongsTo(App\Resident);
    }

     /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->guardian_id = (string) Uuid::generate(4);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'guardian_id';
    }
}
