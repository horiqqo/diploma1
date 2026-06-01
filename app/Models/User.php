<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'birthday',
        'class_number',
        'class_letter'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'teacher_id');
    }

    public function testResults()
    {
        return $this->hasMany(TestResult::class);
    }

    public function isAdmin(): bool
    {
        return $this->role->title === 'admin';
    }

    public function isTeacher(): bool
    {
        return $this->role->title === 'teacher';
    }

}
