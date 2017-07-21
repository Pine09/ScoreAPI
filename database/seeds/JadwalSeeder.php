<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwal')->insert([
           'dosen_id' => '4',
           'matkul_id' => '1',
           'day' => 'Monday',
           'status' => 'Regular',
           'created_at' => Carbon::now()
        ]);
        DB::table('jadwal')->insert([
           'dosen_id' => '1',
           'matkul_id' => '2',
           'day' => 'Tuesday',
           'status' => 'Regular',
           'created_at' => Carbon::now()
        ]);
        DB::table('jadwal')->insert([
           'dosen_id' => '2',
           'matkul_id' => '5',
           'day' => 'Wednesday',
           'status' => 'Regular',
           'created_at' => Carbon::now()
        ]);
        DB::table('jadwal')->insert([
           'dosen_id' => '3',
           'matkul_id' => '3',
           'day' => 'Thursday',
           'status' => 'Regular',
           'created_at' => Carbon::now()
        ]);
        DB::table('jadwal')->insert([
           'dosen_id' => '5',
           'matkul_id' => '4',
           'day' => 'Friday',
           'status' => 'Regular',
           'created_at' => Carbon::now()
        ]);
    }
}
