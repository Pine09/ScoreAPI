<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->insert([
           'jurusan_code' => 'JS0001',
           'jurusan_name' => 'Information System',
           'created_at' => Carbon::now()
        ]);
        DB::table('jurusan')->insert([
           'jurusan_code' => 'JS0002',
           'jurusan_name' => 'Law',
           'created_at' => Carbon::now()
        ]);
        DB::table('jurusan')->insert([
           'jurusan_code' => 'JS0003',
           'jurusan_name' => 'Hospitality',
           'created_at' => Carbon::now()
        ]);
        DB::table('jurusan')->insert([
           'jurusan_code' => 'JS0004',
           'jurusan_name' => 'Accounting',
           'created_at' => Carbon::now()
        ]);
        DB::table('jurusan')->insert([
           'jurusan_code' => 'JS0005',
           'jurusan_name' => 'Management',
           'created_at' => Carbon::now()
        ]);
    }
}
