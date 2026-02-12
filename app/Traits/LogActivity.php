<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

trait LogActivity
{
    public function logActivity($action, $model)
    {
        ActivityLog::create([
            'user_id'  => Auth::id(),
            'action'   => $action,
            'model'    => get_class($model),
            'model_id' => $model->id ?? null,
        ]);
    }
}
