<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nilai')->insert([
           'mahasiswa_id' => '1',
           'jadwal_id' => '1',
           'score' => 'A',
           'created_at' => Carbon::now()
        ]);
        DB::table('nilai')->insert([
           'mahasiswa_id' => '2',
           'jadwal_id' => '1',
           'score' => 'B',
           'created_at' => Carbon::now()
        ]);
        DB::table('nilai')->insert([
           'mahasiswa_id' => '3',
           'jadwal_id' => '2',
           'score' => 'B',
           'created_at' => Carbon::now()
        ]);
        DB::table('nilai')->insert([
           'mahasiswa_id' => '4',
           'jadwal_id' => '3',
           'score' => 'B+',
           'created_at' => Carbon::now()
        ]);
        DB::table('nilai')->insert([
           'mahasiswa_id' => '4',
           'jadwal_id' => '4',
           'score' => 'A',
           'created_at' => Carbon::now()
        ]);
    }
}
