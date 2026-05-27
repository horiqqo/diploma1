<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Test;
use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::factory()->count(3)->create()->each(function ($subject) {
            Theme::factory()->count(3)->create(['subject_id' => $subject->id])->each(function ($theme) {
                Lesson::factory()->count(3)->create(['theme_id' => $theme->id]);

                $test = Test::factory()->create(['theme_id' => $theme->id]);

                Question::factory()->count(5)->create(['test_id' => $test->id])->each(function ($question) {
                    Answer::factory()->count(3)->create(['question_id' => $question->id]);
                    Answer::factory()->create([
                        'question_id' => $question->id,
                        'is_correct' => true,
                    ]);
                });
            });
        });
    }
}
