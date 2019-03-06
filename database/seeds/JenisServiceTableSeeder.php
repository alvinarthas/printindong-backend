<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate
        // DB::table('jenis_service')->truncate();
        // Insert
        DB::table('jenis_service')->insert(array(
            array(
                'service_id' => 4,
                'nama' => 'Kertas'
            ),array(
                'service_id' => 4,
                'nama' => 'Sticker'
            ),array(
                'service_id' => 4,
                'nama' => 'Vinyl'
            )
        ));
    }
}
