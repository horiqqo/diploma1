<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory, softDeletes;

    protected $fillable = [
        'theme_id',
        'title',
        'content',
        'image',
        'video'
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }}
