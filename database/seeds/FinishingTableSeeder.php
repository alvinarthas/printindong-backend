<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinishingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert
        DB::table('finishing')->insert(array(
            array(
                'jenis_bahan_id' => 1,
                'nama' => 'Laminating'
            ),array(
                'jenis_bahan_id' => 1,
                'nama' => 'Hecter'
            ),array(
                'jenis_bahan_id' => 1,
                'nama' => 'Jilid Spiral'
            )
        ));
    }
}
