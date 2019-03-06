<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServiceTableSeeder::Class);
        $this->call(JenisServiceTableSeeder::Class);
        $this->call(JenisBahanTableSeeder::Class);
        $this->call(UkuranBahanTableSeeder::Class);
        $this->call(FinishingTableSeeder::Class);
        $this->call(KotaTableSeeder::Class);
        $this->call(KurirTableSeeder::Class);
    }
}
