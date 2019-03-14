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
                'service_id' => 1,
                'nama' => 'Banner'
            ),
            array(
                'service_id' => 1,
                'nama' => 'Flyer'
            ),
            array(
                'service_id' => 1,
                'nama' => 'Spanduk'
            ),
            array(
                'service_id' => 1,
                'nama' => 'Vinyl'
            ),
            array(
                'service_id' => 1,
                'nama' => 'Poster'
            ),
            array(
                'service_id' => 1,
                'nama' => 'Sticker'
            ),
            array(
                'service_id' => 1,
                'nama' => 'Hangtag'
            ),
            array(
                'service_id' => 2,
                'nama' => 'Bowl Lunch'
            ),
            array(
                'service_id' => 1,
                'nama' => 'Lunch Box'
            ),
            array(
                'service_id' => 1,
                'nama' => 'Dus Box'
            ),
            array(
                'service_id' => 1,
                'nama' => 'Standing Pouch'
            ),
            array(
                'service_id' => 1,
                'nama' => 'Plastik Inner'
            ),
            array(
                'service_id' => 1,
                'nama' => 'Plastik Outer'
            ),
            array(
                'service_id' => 4,
                'nama' => 'Kertas'
            ),
            array(
                'service_id' => 4,
                'nama' => 'Sticker'
            ),
            array(
                'service_id' => 4,
                'nama' => 'Vinyl'
            )
        ));
    }
}
