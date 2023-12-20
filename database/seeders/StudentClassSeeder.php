<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            '1', '2', '3', '4', '5', '6',
            '7', '8', '9', '10'
        ];

        foreach ($names as $name) {
            DB::table('student_classes')->insert([
                'name' => $name,
                'created_at' => now(),
            ]);
        }
    }
}
