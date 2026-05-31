<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run(): void
    {
        $lesson = Lesson::first();

        Test::updateOrCreate(
            ['title' => 'Тест 1'],
            [
                'theme_id' => $lesson->theme_id,
            ]
        );
    }
}
