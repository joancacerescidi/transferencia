<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            "name" => 'ADMIN QQPERU',
            "email" => 'adminqqperu@gmail.com',
            "email_verified_at" => '2023-03-30 01:36:00',
            "password" => bcrypt('3vt&4jT!RkG6sctB'),
            "type_auth" => 'formulario',
            "type" => 'admin',
        ]);
    }
}
