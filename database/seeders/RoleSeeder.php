<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insertOrIgnore(['id' => 1, 'name' => 'Administrator']);
        DB::table('roles')->insertOrIgnore(['id' => 2, 'name' => 'Moderator']);
    }
}
