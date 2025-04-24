<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Freelancer extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function skills(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function careerLevel(): BelongsTo
    {
        return $this->belongsTo(Tag::class, 'career_level_id');
    }
}
