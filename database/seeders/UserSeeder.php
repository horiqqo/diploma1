<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('name', 'admin')->first();
        $teacher = Role::where('name', 'teacher')->first();
        $student = Role::where('name', 'student')->first();

        User::factory()->create([
            'name' => 'Администратор',
            'email' => 'admin@demo.com',
            'role_id' => $admin->id,
        ]);

        User::factory()->teacher()->create([
            'name' => 'Иван Иванович',
            'email' => 'teacher@demo.com',
            'role_id' => $teacher->id,
        ]);

        User::factory()->student()->create([
            'name' => 'Петров Пётр',
            'email' => 'student@demo.com',
            'class_number' => 9,
            'class_letter' => 'А',
            'role_id' => $student->id,
        ]);

        User::factory()->student()->count(10)->create();
    }
}
