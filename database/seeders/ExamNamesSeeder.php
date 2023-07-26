<?php

namespace Database\Seeders;

use App\Models\Examination_name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Examination_name::unguard();
        $examNamePath = public_path('sql/edu_qualification/examination_names.sql');
        DB::unprepared(file_get_contents( $examNamePath));
    }
}
