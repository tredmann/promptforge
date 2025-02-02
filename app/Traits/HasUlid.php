<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUlid
{
    public static function boot(): void
    {
        parent::boot();
        static::creating(function ($model): void {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::ulid();
            }
        });
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }
}
