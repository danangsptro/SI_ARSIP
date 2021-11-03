<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'user_role' => 'Staff',
            'email' => 'admin@email.com',
            'address' => 'Kota Tangerang',
            'password' => Hash::make('q1w2e3r4')
        ]);

        DB::table('users')->insert([
            'name' => 'lurah',
            'user_role' => 'Lurah',
            'email' => 'lurah@email.com',
            'address' => 'Kota Tangerang',
            'password' => Hash::make('q1w2e3r4')
        ]);
    }
}
