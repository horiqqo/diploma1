<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $test = Test::first();

        Question::updateOrCreate(
            ['question' => '2 + 2 = ?'],
            [
                'test_id' => $test->id,
                'image' => null,
            ]
        );

        Question::updateOrCreate(
            ['question' => '5 + 3 = ?'],
            [
                'test_id' => $test->id,
                'image' => null,
            ]
        );
    }
}
