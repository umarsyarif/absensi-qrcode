<?php

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
        User::create([
            'name' => 'Admin',
            'identity' => '001',
            'password' => Hash::make('12345678'),
            'role_id' => 1
        ]);
        User::create([
            'name' => 'Guru',
            'identity' => '002',
            'password' => Hash::make('12345678'),
            'role_id' => 2
        ]);
        User::create([
            'name' => 'Siswa',
            'identity' => '003',
            'password' => Hash::make('12345678'),
            'role_id' => 3
        ]);
    }
}
