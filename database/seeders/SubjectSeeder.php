<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $teacher = User::whereHas('role', function ($q) {
            $q->where('title', 'teacher');
        })->first();

        Subject::updateOrCreate(
            ['title' => 'Математика'],
            [
                'description' => 'Алгебра и геометрия',
                'teacher_id' => $teacher->id,
            ]
        );

        Subject::updateOrCreate(
            ['title' => 'Информатика'],
            [
                'description' => 'Основы программирования',
                'teacher_id' => $teacher->id,
            ]
        );
    }
}
