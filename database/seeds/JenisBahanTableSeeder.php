<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBahanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate
        // DB::table('service')->truncate();
        // Insert
        DB::table('jenis_bahan')->insert(array(
            array(
                'jenis_service_id' => 1,
                'nama' => 'HVS'
            ),array(
                'jenis_service_id' => 1,
                'nama' => 'Book Paper'
            ),array(
                'jenis_service_id' => 1,
                'nama' => 'Art Paper'
            )
        ));
    }
}
