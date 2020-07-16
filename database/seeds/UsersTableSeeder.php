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
        \App\User::create([
            'name' => 'Oki Sulton',
            'Username' => 'okisulton',
            'password' => bcrypt('okisulton'),
            'email' => 'oki@sulton.com'
        ]);
    }
}
