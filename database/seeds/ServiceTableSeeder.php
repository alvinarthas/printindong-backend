<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert
        DB::table('service')->insert(array(
            array(
                'nama' => 'Promotion'
            ),array(
                'nama' => 'Packaging'
            ),array(
                'nama' => 'Merchandising'
            ),array(
                'nama' => 'Document'
            ),array(
                'nama' => 'Stationery'
            ),
        ));
    }
}
