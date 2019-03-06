<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UkuranBahanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert
        DB::table('ukuran_bahan')->insert(array(
            array(
                'jenis_bahan_id' => 1,
                'nama' => 'A1'
            ),array(
                'jenis_bahan_id' => 1,
                'nama' => 'A2'
            ),array(
                'jenis_bahan_id' => 1,
                'nama' => 'A3'
            )
        ));
    }
}
