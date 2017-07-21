<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'NI' => '00000017201',
            'password' => bcrypt('secret'),
            'role' => 'Student',
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'NI' => '00000019439',
            'password' => bcrypt('secret'),
            'role' => 'Student',
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'NI' => '00000018442',
            'password' => bcrypt('secret'),
            'role' => 'Student',
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'NI' => '00000020148',
            'password' => bcrypt('secret'),
            'role' => 'Student',
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'NI' => '00000099999',
            'password' => bcrypt('secret'),
            'role' => 'Lecturer',
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'NI' => '00000088888',
            'password' => bcrypt('secret'),
            'role' => 'Lecturer',
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'NI' => '00000077777',
            'password' => bcrypt('secret'),
            'role' => 'Lecturer',
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'NI' => '00000066666',
            'password' => bcrypt('secret'),
            'role' => 'Lecturer',
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'NI' => '00000055555',
            'password' => bcrypt('secret'),
            'role' => 'Lecturer',
            'created_at' => Carbon::now()
        ]);
    }
}
