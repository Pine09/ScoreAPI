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
           'status' => 'On Going',
           'created_at' => Carbon::now()
        ]);
        DB::table('jadwal')->insert([
           'dosen_id' => '1',
           'matkul_id' => '2',
           'day' => 'Tuesday',
           'status' => 'On Going',
           'created_at' => Carbon::now()
        ]);
        DB::table('jadwal')->insert([
           'dosen_id' => '2',
           'matkul_id' => '5',
           'day' => 'Wednesday',
           'status' => 'On Going',
           'created_at' => Carbon::now()
        ]);
        DB::table('jadwal')->insert([
           'dosen_id' => '3',
           'matkul_id' => '3',
           'day' => 'Thursday',
           'status' => 'On Going',
           'created_at' => Carbon::now()
        ]);
        DB::table('jadwal')->insert([
           'dosen_id' => '5',
           'matkul_id' => '4',
           'day' => 'Friday',
           'status' => 'Ended',
           'created_at' => Carbon::now()
        ]);
    }
}
