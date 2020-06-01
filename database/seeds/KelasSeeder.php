<?php

use App\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //kelas
        for ($i = 10; $i <= 12; $i++) {
            for ($j = 1; $j <= 2; $j++) {
                Kelas::create([
                    'nama' => $i . ' TKJ ' . $j
                ]);
            }
        }
    }
}
