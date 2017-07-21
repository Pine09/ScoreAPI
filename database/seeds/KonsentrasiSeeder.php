<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KonsentrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('konsentrasi')->insert([
           'konsentrasi_code' => 'KS0001',
           'konsentrasi_name' => 'Web & Mobile Programming',
           'jurusan_id' => '1',
           'created_at' => Carbon::now()
        ]);
        DB::table('konsentrasi')->insert([
           'konsentrasi_code' => 'KS0002',
           'konsentrasi_name' => 'Project Management',
           'jurusan_id' => '1',
           'created_at' => Carbon::now()
        ]);
        DB::table('konsentrasi')->insert([
           'konsentrasi_code' => 'KS0003',
           'konsentrasi_name' => 'Law Type A',
           'jurusan_id' => '2',
           'created_at' => Carbon::now()
        ]);
        DB::table('konsentrasi')->insert([
           'konsentrasi_code' => 'KS0004',
           'konsentrasi_name' => 'Law Type B',
           'jurusan_id' => '2',
           'created_at' => Carbon::now()
        ]);
        DB::table('konsentrasi')->insert([
           'konsentrasi_code' => 'KS0005',
           'konsentrasi_name' => 'Management Side A',
           'jurusan_id' => '5',
           'created_at' => Carbon::now()
        ]);
        DB::table('konsentrasi')->insert([
           'konsentrasi_code' => 'KS0006',
           'konsentrasi_name' => 'Management Side B',
           'jurusan_id' => '5',
           'created_at' => Carbon::now()
        ]);
    }
}
