<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $q1 = Question::first();

        Answer::updateOrCreate(
            ['answer' => '4'],
            [
                'question_id' => $q1->id,
                'is_correct' => true,
            ]
        );

        Answer::updateOrCreate(
            ['answer' => '5'],
            [
                'question_id' => $q1->id,
                'is_correct' => false,
            ]
        );
    }
}
