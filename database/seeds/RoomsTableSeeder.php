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
        DB::table('rooms')->insert([
            'room_id' =>  (string) Uuid::generate(4),
            'room_no' => Str::random(10),
            'site' => Str::random(10),
            'building' => Str::random(10),
            'floor_no' => 1,
            'room_size' => 15,
            'type_of_bed' => '1SB',
            'short_term_rent' => 7800,
            'long_term_rent' => 6800,
            'transient_rent' => 2000,
        ]);

        DB::table('rooms')->insert([
            'room_id' =>  (string) Uuid::generate(4),
            'room_no' => Str::random(10),
            'site' => Str::random(10),
            'building' => Str::random(10),
            'floor_no' => 'G',
            'room_size' => 15,
            'type_of_bed' => '2SB',
            'short_term_rent' => 7800,
            'long_term_rent' => 6800,
            'transient_rent' => 2000,
        ]);
    }
}
