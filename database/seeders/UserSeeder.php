<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insertOrIgnore([
            'id' => 1, 
            'name' => 'admin', 
            'email' => 'admin@guestmanager.com', 
            'password' => bcrypt('guestmanager'), 
            'role_id' => 1,
            'token' => "admintoken",
        ]);

        DB::table('users')->insertOrIgnore([
            'id' => 2, 
            'name' => 'moderator', 
            'email' => 'moderator@guestmanager.com', 
            'password' => bcrypt('guestmanager'), 
            'role_id' => 2,
            'token' => "modtoken",
        ]);
    }
}
