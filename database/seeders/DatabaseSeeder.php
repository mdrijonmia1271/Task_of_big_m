<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(DivisionsSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(UpazilasSeeder::class);
        $this->call(ExamNamesSeeder::class);
        $this->call(UniversitiesSeeder::class);
        $this->call(BoardsSeeder::class);
    }
}
