<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacherRole = Role::where('title', 'teacher')->first();
        $studentRole = Role::where('title', 'student')->first();

        User::updateOrCreate(
            ['email' => 'teacher@test.com'],
            [
                'name' => 'Teacher One',
                'password' => Hash::make('password'),
                'role_id' => $teacherRole->id,
                'birthday' => '1990-01-01',
                'class_number' => 0,
                'class_letter' => 'T',
            ]
        );

        User::updateOrCreate(
            ['email' => 'student@test.com'],
            [
                'name' => 'Student One',
                'password' => Hash::make('password'),
                'role_id' => $studentRole->id,
                'birthday' => '2005-01-01',
                'class_number' => 10,
                'class_letter' => 'A',
            ]
        );
    }
}
