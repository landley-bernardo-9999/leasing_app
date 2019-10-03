<?php

use Illuminate\Database\Seeder;

class BillingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('billings')->insert([
            'bil_id' =>  (string) Uuid::generate(4),
            'desc' => 'asdasda',
            'booking_id_foreign' => 'asdasdasd'
        ]);

        // INSERT into billings (
        //     billings.desc,
        //     bil_amt,
        //     booking_id_foreign
        // )
        
        // SELECT  
        //     'MONTHLY RENT',
        //     long_term_rent,
        //     booking_id
        // FROM bookings INNER JOIN rooms
        // ON bookings.room_id_foreign=rooms.room_id
        // where bookings.booking_status = 'ACTIVE' and booking_term = 'LONG TERM'
    }
}
