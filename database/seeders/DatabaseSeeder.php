<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        DB::table('rols_tbl')->insert([
            'name_rol' => 'Administrativo',
        ]);
        DB::table('rols_tbl')->insert([
            'name_rol' => 'Empleado',
        ]);

        \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'francisco',
            'email' => 'a@a.com',
            'password' => Hash::make('1234'),
            'rol_id' => '1',
        ]);
    }
}
