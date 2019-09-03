<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $primaryKey = 'booking_id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'check_in_date','check_out_date','actual_check_out_date', 'booking_term', 'booking_status', 'initial_water_reading', 'final_water_reading', 'initial_electric_reading', 'final_electric_reading', 'room_id_foreign', 'res_id_foreign'
    ];

    public function residents(){
        return $this->belongsTo(App\Resident);
    }

    public function rooms(){
        return $this->belongsTo(App\Room);
    }
}
