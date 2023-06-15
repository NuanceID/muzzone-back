<?php

declare(strict_types=1);

namespace App\Models;

use App\Services\RequiredScopes\HasRequiredScopes;
use App\Services\RequiredScopes\HasRequiredScopesInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

/**
 * @property string $name
 * @property-read User $user_id
 */
class Playlist extends BaseModel implements HasRequiredScopesInterface
{
    use HasFactory;
    use HasRequiredScopes;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('cover')
            ->useDisk('playlist');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class);
    }

    public function getRequiredScopes(): array
    {
        if (Auth::check()) {
            return [
                'onlyPublic'
            ];
        }

        if (Auth::hasUser() && Auth::user()->role === 'user') {
            return [
                'myPlaylists'
            ];
        }

        return [];
    }

    public function scopeOnlyPublic(Builder $query)
    {
        $query->doesntHave('user');
    }

    public function scopeMyPlaylists(Builder $query)
    {
        $query->where('playlists.user_id', Auth::user()->id);
    }
}
