<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = DB::table('tenants')->insert([
            
            'name' => 'ative360',
            'uuid' => Str::uuid()
        ]);

        DB::table('users')->insert([
            'tenant_id' =>  1,
            'name' => 'wandilson',
            'last_name' =>  'oliver',
            'email' => 'wandilson.oliver@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
