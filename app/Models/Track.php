<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Track extends BaseModel
{
    use HasFactory;

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class);
    }
}
