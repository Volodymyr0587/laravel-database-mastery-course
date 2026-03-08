<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;

trait PostScopes
{
    /**
     * Local Scope a query to only published posts.
     */
    #[Scope]
    protected function published(Builder $query): void
    {
        $query->where('is_published', true);
    }

    /**
     * Local Scope a query to user data.
     */
    #[Scope]
    protected function withUserData(Builder $query): void
    {
        $query->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name', 'users.email');
    }

    #[Scope]
    protected function publishedByUser(Builder $query, $userId): void
    {
        $query->where('user_id', $userId)
            ->whereNotNull('created_at');
    }
}
