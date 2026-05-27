<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory, softDeletes;


    protected $fillable = ['title', 'icon', 'description', 'class_number', 'is_active'];

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }
}
