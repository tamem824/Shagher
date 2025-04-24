<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    /** @use HasFactory<TagFactory> */
    use HasFactory;
    protected $guarded=['id'];

    protected $casts = [
        'types' =>"array"
    ];
    public function jobs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'job_tag', 'tag_id', 'job_id');
    }
//    public function freelancers(): MorphToMany
//    {
//        return $this->morphedByMany(Freelancer::class, 'taggable');
//    }

}
