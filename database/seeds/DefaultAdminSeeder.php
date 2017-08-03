<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
           'NI' => '14045',
           'password' => bcrypt('admin'),
           'role' => 'Admin',
           'created_at' => Carbon::now()
      ]);
    }
}
