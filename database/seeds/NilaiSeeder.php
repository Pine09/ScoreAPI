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
           'assignment' => '80',
           'UTS' => '80',
           'UAS' => '80',
           'total' => 'A-',
           'created_at' => Carbon::now()
        ]);
        DB::table('nilai')->insert([
           'mahasiswa_id' => '2',
           'jadwal_id' => '1',
           'assignment' => '100',
           'UTS' => '80',
           'UAS' => '80',
           'total' => 'A',
           'created_at' => Carbon::now()
        ]);
        DB::table('nilai')->insert([
           'mahasiswa_id' => '3',
           'jadwal_id' => '2',
           'assignment' => '20',
           'UTS' => '80',
           'UAS' => '80',
           'total' => 'B-',
           'created_at' => Carbon::now()
        ]);
        DB::table('nilai')->insert([
           'mahasiswa_id' => '4',
           'jadwal_id' => '3',
           'assignment' => '100',
           'UTS' => '40',
           'UAS' => '70',
           'total' => 'B-',
           'created_at' => Carbon::now()
        ]);
        DB::table('nilai')->insert([
           'mahasiswa_id' => '4',
           'jadwal_id' => '4',
           'assignment' => '60',
           'UTS' => '80',
           'UAS' => '70',
           'total' => 'B+',
           'created_at' => Carbon::now()
        ]);
    }
}
