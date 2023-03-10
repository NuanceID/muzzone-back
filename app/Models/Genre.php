<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name
 * @property string $description
 * @property int|null $genre_id
 * @property Genre $subGenre
 */
class Genre extends BaseModel
{
    use HasFactory;

    protected $guarded = ['id'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('cover')
            ->useDisk('genre');
    }

    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class);
    }

    public function subGenre(): HasOne
    {
        return $this->hasOne(Genre::class, 'id', 'genre_id');
    }
}
