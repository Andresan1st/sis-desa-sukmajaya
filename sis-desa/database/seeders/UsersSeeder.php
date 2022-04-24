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
        // \DB::table('tb_jabatan')->insert([
        //     [
        //         'nama_jabatan' => 'admin',
        //         'status' => 'aktif',
        //         'created_at' => \Carbon\Carbon::now(),
        //     ],
        // ]);

        // \DB::table('tb_pegawai')->insert([
        //     [
        //         'nip' => '111111111',
        //         'nama' => 'trial',
        //         'alamat' => 'trial',
        //         'no_telp' => '08484848654',
        //         'jenkel' => 'trial',
        //         'id_jabatan'=>1,
        //         'created_at' => \Carbon\Carbon::now(),
        //         'status' => 'aktif'
        //     ],
        // ]);

        \DB::table('users')->insert([
            [
                'username' => 'trial',
                'email' => 'trial@trial.trial',
                'password' => Hash::make('trial123'),
                'role' => 'admin',
                'status' => 'aktif',
                'id_pegawai'=>1,
                'created_at' => \Carbon\Carbon::now(),
                'email_verified_at' => \Carbon\Carbon::now(),
            ],
        ]);

    }
}
