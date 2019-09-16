<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<=100; $i++ ) {
        DB::table('users')->insert([
            'user_id' =>  (string) Uuid::generate(4),
            'name' => Str::random(10),
            'username' => Str::random(10),
            'password' => Hash::make('12345678'),
            'role' => 'owner',
        ]);
        }
    }
    
}
