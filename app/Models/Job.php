<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    protected $casts = [
        'gender' => \App\Gender::class,
        'qualification' => \App\Qualification::class,

        'responsibility' => 'array',
        'skill_experience' => 'array',
        'experience' => 'array',

    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'job_tag', 'job_id', 'tag_id');
    }
    public function career_level(): BelongsTo
    {
        return $this->belongsTo(Tag::class, 'career_level_id');
    }

    public function employment_type(): BelongsTo
    {
        return $this->belongsTo(Tag::class, 'employment_type_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'posted_by');
    }
}
