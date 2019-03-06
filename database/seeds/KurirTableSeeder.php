<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KurirTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert
        DB::table('kurir')->insert(array(
            array(
                'nama' => 'Go-Send',
                'harga' => 50000
            ),array(
                'nama' => 'JNE',
                'harga' => 100000
            ),array(
                'nama' => 'Tiki',
                'harga' => 5000
            ),array(
                'nama' => 'Pos Indonesia',
                'harga' => 80000
            ),array(
                'nama' => 'Angkot',
                'harga' => 7000
            ),
        ));
    }
}
