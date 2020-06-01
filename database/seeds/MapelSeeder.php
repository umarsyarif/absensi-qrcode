<?php

use App\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //mapel
        Mapel::create([
            'nama' => 'Matematika',
            'singkatan' => 'MTK'
        ]);
        Mapel::create([
            'nama' => 'Fisika',
            'singkatan' => 'FIS'
        ]);
        Mapel::create([
            'nama' => 'Kimia',
            'singkatan' => 'KIM'
        ]);
    }
}
