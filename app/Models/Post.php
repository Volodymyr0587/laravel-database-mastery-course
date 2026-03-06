<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'description',
        'min_to_read',
        'is_published',
    ];
    // protected $guarded = [];

    // protected $table = "users";
    // protected $primaryKey = "slug";
    // public $incrementing = false;
    // protected $keyType = "string";
    // public $timestamps = false;
    // protected $dateFormat = "U";
    // public const CREATED_AT = 'date_created_at';
    // public const UPDATED_AT = 'date_updated_at';
    // protected $attributes = [
    //     "user_id" => 1,
    //     "is_published" => false,
    //     "description" => "Please add your description right here.."
    // ];
    // protected $connection = "sqlite";

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
