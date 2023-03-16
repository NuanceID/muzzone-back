<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $name
 * @property string $description
 */
class Category extends BaseModel
{
    use HasFactory;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('cover')
            ->useDisk('category');
    }

    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class);
    }
}
