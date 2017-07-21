<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KRSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('KRS')->insert([
           'jadwal_id' => '1',
           'mahasiswa_id' => '1',
           'created_at' => Carbon::now()
        ]);
        DB::table('KRS')->insert([
           'jadwal_id' => '1',
           'mahasiswa_id' => '2',
           'created_at' => Carbon::now()
        ]);
        DB::table('KRS')->insert([
           'jadwal_id' => '2',
           'mahasiswa_id' => '3',
           'created_at' => Carbon::now()
        ]);
        DB::table('KRS')->insert([
           'jadwal_id' => '3',
           'mahasiswa_id' => '4',
           'created_at' => Carbon::now()
        ]);
        DB::table('KRS')->insert([
           'jadwal_id' => '4',
           'mahasiswa_id' => '4',
           'created_at' => Carbon::now()
        ]);
    }
}
