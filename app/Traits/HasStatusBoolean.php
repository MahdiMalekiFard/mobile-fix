<?php

namespace App\Traits;

use App\Enums\BooleanEnum;
use Illuminate\Database\Eloquent\Builder;

trait HasStatusBoolean
{
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', BooleanEnum::ENABLE->value);
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('published', BooleanEnum::DISABLE->value);
    }
}
