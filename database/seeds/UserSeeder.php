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
            'name' => 'Kaur Umum',
            'user_role' => 'kaur_umum',
            'email' => 'kaurUmum@gmail.com',
            'password' => Hash::make('kaurumum123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Kaur Pelayanan',
            'user_role' => 'kaur_pelayanan',
            'email' => 'kaurPelayanan@gmail.com',
            'password' => Hash::make('kaurpelayanan123'),
        ]);

        DB::table('users')->insert([
            'name' => 'sekdes',
            'user_role' => 'sekdes',
            'email' => 'sekdes@gmail.com',
            'password' => Hash::make('sekdes123')
        ]);
    }
}
