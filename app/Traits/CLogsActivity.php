<?php

namespace App\Traits;

use Spatie\Activitylog\Traits\LogsActivity;

trait CLogsActivity
{
    use LogsActivity;

    protected static function bootCLogsActivity(): void
    {
        static::deleted(function ($model) {
            $model->activities()->delete();
        });
    }
}
