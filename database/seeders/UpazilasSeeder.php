<?php

namespace Database\Seeders;

use App\Models\Upazila;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpazilasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Upazila::unguard();
        $upazilaPath = public_path('sql/upazilas.sql');
        DB::unprepared(file_get_contents($upazilaPath));
    }
}
