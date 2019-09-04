<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<=131; $i++ ) {
            DB::table('rooms')->insert([
                'room_id' =>  (string) Uuid::generate(4),
                'room_no' => Str::random(10),
                'site' => 'NORTH CAMBRIDGE',
                'room_size' => 15,
                'short_term_rent' => 7800,
                'long_term_rent' => 6800,
                'transient_rent' => 1500,
                'building' => 'HARVARD'
            ]);
        }

        for($i = 1; $i<=75; $i++ ) {
            DB::table('rooms')->insert([
                'room_id' =>  (string) Uuid::generate(4),
                'room_no' => Str::random(10),
                'site' => 'NORTH CAMBRIDGE',
                'room_size' => 15,
                'short_term_rent' => 8500,
                'long_term_rent' => 7500,
                'transient_rent' => 1500,
                'building' => 'PRINCETON'
            ]);
        }

        for($i = 1; $i<=46; $i++ ) {
            DB::table('rooms')->insert([
                'room_id' =>  (string) Uuid::generate(4),
                'room_no' => Str::random(10),
                'site' => 'NORTH CAMBRIDGE',
                'room_size' => 20,
                'short_term_rent' => 12000,
                'long_term_rent' => 11000,
                'transient_rent' => 1500,
                'building' => 'WHARTON'
            ]);
        }
    }
}
