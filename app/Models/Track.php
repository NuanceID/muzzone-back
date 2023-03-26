<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * @property string $name
 * @property string $description
 * @property string $bitrate
 * @property-read Album $album
 * @property-read Collection $artists
 * @property-read Collection $genres
 * @property-read Collection $playlists
 */
class Track extends BaseModel
{
    use HasFactory;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('cover')
            ->useDisk('track');

        $this
            ->addMediaCollection('file')
            ->useDisk('track');
    }

    public function getSingleMediaUrl(): ?string
    {
        return $this->getFirstMedia('file')?->getUrl();
    }

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class);
    }
}
