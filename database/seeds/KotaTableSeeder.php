<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert
        DB::table('kota')->insert(array(
            array(
                'nama' => 'Bandung'
            ),array(
                'nama' => 'Jakarta'
            ),array(
                'nama' => 'Yogyakarta'
            ),array(
                'nama' => 'Medan'
            ),array(
                'nama' => 'Palembang'
            ),
        ));
    }
}
