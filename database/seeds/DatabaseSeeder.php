<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DefaultAdminSeeder::class);
        $this->call(DosenSeeder::class);
        $this->call(MatkulSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(JadwalSeeder::class);
        $this->call(KonsentrasiSeeder::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(KRSSeeder::class);
        $this->call(NilaiSeeder::class);
        $this->call(UserSeeder::class);
    }
}
