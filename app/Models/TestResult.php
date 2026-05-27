<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResult extends Model
{
    /** @use HasFactory<\Database\Factories\TestResultFactory> */
    use HasFactory, softDeletes;

    protected $fillable = ['score', 'total', 'completed_at', 'user_id', 'test_id'];

    protected $casts = ['completed_at' => 'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
