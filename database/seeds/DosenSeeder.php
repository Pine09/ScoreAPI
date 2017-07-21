<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosen')->insert([
           'NIDN' => '00000099999',
           'nama_depan' => 'Darsono',
           'nama_belakang' => 'Nababan',
           'email' => 'darsono.nababan@gmail.com',
           'alamat' => 'Jln Diponegoro',
           'jenis_kelamin' => 'Laki-Laki',
           'created_at' => Carbon::now()
        ]);

        DB::table('dosen')->insert([
           'NIDN' => '00000088888',
           'nama_depan' => 'Faisal',
           'nama_belakang' => 'Nadjar',
           'email' => 'faisal.nadjar@gmail.com',
           'alamat' => 'Jln Diponegoro',
           'jenis_kelamin' => 'Laki-Laki',
           'created_at' => Carbon::now()
        ]);

        DB::table('dosen')->insert([
           'NIDN' => '00000077777',
           'nama_depan' => 'Denny',
           'nama_belakang' => 'Sutomo',
           'email' => 'denny.sutomo@gmail.com',
           'alamat' => 'Jln Diponegoro',
           'jenis_kelamin' => 'Laki-Laki',
           'created_at' => Carbon::now()
        ]);

        DB::table('dosen')->insert([
           'NIDN' => '00000066666',
           'nama_depan' => 'Eddy',
           'nama_belakang' => 'Fang',
           'email' => 'eddy.fang@gmail.com',
           'alamat' => 'Jln Diponegoro',
           'jenis_kelamin' => 'Laki-Laki',
           'created_at' => Carbon::now()
        ]);

        DB::table('dosen')->insert([
           'NIDN' => '00000055555',
           'nama_depan' => 'Indra',
           'nama_belakang' => 'Gunawan',
           'email' => 'indra.gunawan@gmail.com',
           'alamat' => 'Jln Diponegoro',
           'jenis_kelamin' => 'Laki-Laki',
           'created_at' => Carbon::now()
        ]);
    }
}
