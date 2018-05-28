<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nuramalia Hajar',
            'email' => 'nuramalia.hajar@gmail.com',
            'password' => bcrypt('boss86siap'),
            'role' => 0
        ]);
    }
}
