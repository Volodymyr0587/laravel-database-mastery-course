<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Video extends Model
{
    protected $fillable = [
        'title',
        'url',
        'description',
    ];

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function badges(): MorphToMany
    {
        return $this->morphToMany(Badge::class, 'badgeable');
    }
}
