<?php

namespace Database\Seeders;
use App\Models\Tb_jabatan;
use App\Models\Tb_pegawai;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $jabatan = Tb_jabatan::where('nama_jabatan', 'super_admin')->first();
       
        $jabatan = Tb_jabatan::updateOrCreate(
            [
                'id' => 1
            ],

            [
                'nama_jabatan'  => 'super_admin',
                'status'        => 'aktif',
            ]
        );

        $pegawai = Tb_pegawai::updateOrCreate(
            [
                'id_jabatan'    => $jabatan->id,
            ],
            [
                'nip'           => Str::random(90),
                'nama_pegawai'  => 'super admin',
            ]
        );

        $user   = User::updateOrCreate(
            [
                'id_pegawai'    => $pegawai->id,
            ],
            [
                'username'      => 'admin',
                'password'      => Hash::make('super_admin'),
            ]
        );
    }
}
