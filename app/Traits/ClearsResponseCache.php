<?php

namespace App\Traits;

use Spatie\ResponseCache\Facades\ResponseCache;

trait ClearsResponseCache
{
    public static function bootClearsResponseCache(): void
    {
        self::created(function ($model) {
            $model->clearResponseCache();
        });

        self::updated(function ($model) {
            $model->clearResponseCache();
        });

        self::deleted(function ($model) {
            $model->clearResponseCache();
        });
    }

    public function clearResponseCache(): void
    {
        ResponseCache::forget($this->cacheForgetUrls());
    }

    abstract protected function cacheForgetUrls(): array|string;
}
