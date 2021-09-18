<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            [
                'name' => 'Rafael Londono',
                'email' => 'rafael.londonob@autonoma.edu.co',
                'password' => Hash::make('hola123'),
                'type' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at'=> Carbon::now()
            ]
        ]);
    }
}
