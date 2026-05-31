<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    public function run(): void
    {
        $theme = Theme::first();

        Lesson::updateOrCreate(
            ['title' => 'Введение'],
            [
                'theme_id' => $theme->id,
                'content' => 'Базовое введение в тему',
                'image' => null,
                'video' => null,
            ]
        );
    }
}
