<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Echo\Facades\Echo;

class LogController extends Controller
{
    public function index()
    {

        $logs = file(storage_path('logs/laravel.log'));

        // Parse  logs.
        $parsedLogs = [];
        foreach ($logs as $log) {
            $parsedLogs[] = json_decode($log);
        }

        $parsedLogs = array_slice($parsedLogs, -50);

        Echo::channel('logs')->broadcast('logs.update', $parsedLogs);

        return view('logs.index');
    }
}
