<?php

namespace Database\Seeders;

use App\Models\Test;
use App\Models\TestResult;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'student@test.com')->first();
        $test = Test::first();

        TestResult::updateOrCreate(
            [
                'user_id' => $user->id,
                'test_id' => $test->id,
            ],
            [
                'score' => 5,
            ]
        );
    }
}
