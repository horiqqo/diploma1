<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory, softDeletes;

    protected $fillable = ['title', 'content', 'image_path', 'order_index', 'theme_id'];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
