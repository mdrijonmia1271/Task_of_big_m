<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        University::unguard();
        $universitiesPath = public_path('sql/edu_qualification/universities.sql');
        DB::unprepared(file_get_contents($universitiesPath));
    }
}
