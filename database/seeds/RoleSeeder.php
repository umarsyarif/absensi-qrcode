<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'kepsek']);
        Role::create(['name' => 'kurikulum']);
        Role::create(['name' => 'tu']);
        Role::create(['name' => 'guru']);
        Role::create(['name' => 'siswa']);
    }
}
