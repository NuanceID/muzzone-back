<?php

declare(strict_types=1);

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @method static filter()
 */
class BaseModel extends Model implements HasMedia
{
    use SoftDeletes;
    use Filterable;
    use InteractsWithMedia;

    public function getSingleImageUrl(): ?string
    {
        return $this->getFirstMedia('cover')?->getUrl();
    }
}
