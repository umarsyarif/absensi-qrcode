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
            'name' => 'Kepala Sekolah',
            'identity' => '007',
            'password' => Hash::make('12345678'),
            'role_id' => 1
        ]);
    }
}
