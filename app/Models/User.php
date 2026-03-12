<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Scopes\BalanceVerifiedScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// #[ScopedBy([BalanceVerifiedScope::class])]
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function companyPhoneNumber(): HasOneThrough
    {
        return $this->hasOneThrough(
            PhoneNumber::class,
            Company::class,
            'user_id',
            'company_id',
            'id',
            'id'
        );
    }

    /**
     * Get the latest job of the user.
     * @return HasOne<Job, User>
     */
    public function latestJob(): HasOne
    {
        return $this->hasOne(Job::class)->latestOfMany();
    }

    /**
     * Get the oldest job of the user.
     * @return HasOne<Job, User>
     */
    public function oldestJob(): HasOne
    {
        return $this->hasOne(Job::class)->oldestOfMany();
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * manually register the global scope by overriding the model's 
     * booted method and invoke the model's addGlobalScope method. 
     * The addGlobalScope method accepts an instance of your scope 
     * as its only argument
     */
    // protected static function booted(): void
    // {
    //     static::addGlobalScope(new BalanceVerifiedScope());
    // }
}
