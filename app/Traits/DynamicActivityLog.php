<?php

namespace App\Traits;

use Spatie\Activitylog\Traits\LogsActivity;

trait DynamicActivityLog {

    use LogsActivity;

    protected static $logFillable = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        $actionLogsConfig = config("action_logs");
        $event = $actionLogsConfig['actions'][$eventName] ?? $eventName;
        $model = $actionLogsConfig['models'][strtolower(class_basename($this))] ?? strtolower(class_basename($this));

        return ":causer.name $event $model mã :subject.id";
    }

    public function getLogNameToUse(string $eventName = ''): string
    {
        return  $eventName;
    }
}
