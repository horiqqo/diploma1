<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    public function run(): void
    {
        $math = Subject::where('title', 'Математика')->first();
        $cs = Subject::where('title', 'Информатика')->first();

        Theme::updateOrCreate(
            ['title' => 'Линейные уравнения'],
            [
                'subject_id' => $math->id,
                'description' => 'Основы линейных уравнений',
                'class_number' => 10,
                'class_letter' => 'A',
            ]
        );

        Theme::updateOrCreate(
            ['title' => 'Переменные и типы данных'],
            [
                'subject_id' => $cs->id,
                'description' => 'Основы программирования',
                'class_number' => 10,
                'class_letter' => 'A',
            ]
        );
    }
}
