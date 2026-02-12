<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request)
{
    $query = ActivityLog::with('user')->latest();

    // Фильтр по пользователю
    if ($request->filled('user_id')) {
        $query->where('user_id', $request->user_id);
    }

    // Фильтр по действию
    if ($request->filled('action')) {
        $query->where('action', $request->action);
    }

    // Фильтр по модели
    if ($request->filled('model')) {
        $query->where('model', $request->model);
    }

    $logs = $query->paginate(20)->appends($request->query());

    $users = User::all();

    // ⭐ ДОБАВЛЕНО: список моделей для выпадающего списка
    $models = [
        'App\Models\User',
        'App\Models\Role',
        'App\Models\Permission',
    ];

    // ⭐ ДОБАВЛЕНО: передаём $models в Blade
    return view('admin.logs.index', compact('logs', 'users', 'models'));
}

}
