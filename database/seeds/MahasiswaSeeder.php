<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->insert([
           'NIM' => '00000017201',
           'nama_depan' => 'Wilson',
           'nama_belakang' => 'Nicholas',
           'email' => 'wilson.nicholas@gmail.com',
           'alamat' => 'Jl.Diponegoro',
           'jenis_kelamin' => 'Pria',
           'jurusan_id' => '1',
           'konsentrasi_id' => '1',
           'angkatan' => '2015',
           'kelas' => '15IS1',
           'created_at' => Carbon::now()
        ]);
        DB::table('mahasiswa')->insert([
           'NIM' => '00000019439',
           'nama_depan' => 'Alex',
           'nama_belakang' => 'Lee',
           'email' => 'alex.lee@gmail.com',
           'alamat' => 'Jl.Diponegoro',
           'jenis_kelamin' => 'Laki-Laki',
           'jurusan_id' => '1',
           'konsentrasi_id' => '1',
           'angkatan' => '2015',
           'kelas' => '15IS1',
           'created_at' => Carbon::now()
        ]);
        DB::table('mahasiswa')->insert([
           'NIM' => '00000018442',
           'nama_depan' => 'Frans',
           'nama_belakang' => 'Martin',
           'email' => 'frans.martin@gmail.com',
           'alamat' => 'Jl.Diponegoro',
           'jenis_kelamin' => 'Laki-Laki',
           'jurusan_id' => '2',
           'konsentrasi_id' => null,
           'angkatan' => '2015',
           'kelas' => '15IS2',
           'created_at' => Carbon::now()
        ]);
        DB::table('mahasiswa')->insert([
           'NIM' => '00000020148',
           'nama_depan' => 'Artoria',
           'nama_belakang' => 'Pendragon',
           'email' => 'artoria.pendragon@gmail.com',
           'alamat' => 'Jl.Diponegoro',
           'jenis_kelamin' => 'Perempuan',
           'jurusan_id' => '2',
           'konsentrasi_id' => '3',
           'angkatan' => '2015',
           'kelas' => '15IS3',
           'created_at' => Carbon::now()
        ]);

    }
}
