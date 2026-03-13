<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Badge extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    public function badgeables(): MorphToMany
    {
        return $this->morphToMany(Badgeable::class, 'badgeable');
    }
}
