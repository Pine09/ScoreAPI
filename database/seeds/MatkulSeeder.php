<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matkul')->insert([
           'matkul_code' => 'MK0001',
           'matkul_name' => 'English',
           'bobot' => '4',
           'created_at' => Carbon::now()
        ]);
        DB::table('matkul')->insert([
           'matkul_code' => 'MK0002',
           'matkul_name' => 'Database Management',
           'bobot' => '4',
           'created_at' => Carbon::now()
        ]);
        DB::table('matkul')->insert([
           'matkul_code' => 'MK0003',
           'matkul_name' => 'Advanced Web Programming',
           'bobot' => '4',
           'created_at' => Carbon::now()
        ]);
        DB::table('matkul')->insert([
           'matkul_code' => 'MK0004',
           'matkul_name' => 'Web Service',
           'bobot' => '4',
           'created_at' => Carbon::now()
        ]);
        DB::table('matkul')->insert([
           'matkul_code' => 'MK0005',
           'matkul_name' => 'World Religion',
           'bobot' => '4',
           'created_at' => Carbon::now()
        ]);
        DB::table('matkul')->insert([
           'matkul_code' => 'MK0006',
           'matkul_name' => 'Philosophy of Science',
           'bobot' => '4',
           'created_at' => Carbon::now()
        ]);
    }
}
