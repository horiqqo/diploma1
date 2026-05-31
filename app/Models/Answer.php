<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    /** @use HasFactory<\Database\Factories\AnswerFactory> */
    use HasFactory, softDeletes;

    protected $fillable = [
        'question_id',
        'answer',
        'is_correct'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }}
