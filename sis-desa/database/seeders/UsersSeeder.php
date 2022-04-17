<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'username' => 'trial',
                'email' => 'trial@trial.trial',
                'password' => Hash::make('trial123'),
                'role' => 'admin',
                'id_pegawai'=>2,
                'created_at' => \Carbon\Carbon::now(),
                'email_verified_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
