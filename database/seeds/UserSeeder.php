<?php

use App\Kelas;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        User::create([
            'name' => 'Admin',
            'identity' => '001',
            'password' => Hash::make('12345678'),
            'role_id' => 1
        ]);
        //guru
        User::create([
            'name' => 'Guru',
            'identity' => '002',
            'password' => Hash::make('12345678'),
            'role_id' => 2
        ])->guru()->create([
            'jenis_kelamin' => 'Laki-Laki',
            'alamat' => '',
            'no_hp' => ''
        ]);

        $kelas = Kelas::all();
        $id = 003;
        foreach ($kelas as $row) {
            $x = 1;
            for ($i = 1; $i <= 5; $i++) {
                User::create([
                    'name' => 'Siswa ' . $row->nama . ' ' . $x++,
                    'identity' => '00' . $id++,
                    'password' => Hash::make('12345678'),
                    'role_id' => 3
                ])->siswa()->create([
                    'kelas_id' => $row->id,
                    'jenis_kelamin' => 'Laki-Laki',
                    'alamat' => '',
                    'no_hp' => '',
                    'nama_ibu' => '',
                    'no_hp_ibu' => '',
                    'nama_ayah' => '',
                    'no_hp_ayah' => ''
                ]);
            }
        }
    }
}
