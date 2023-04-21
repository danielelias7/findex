<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

// Route::get('/', function (Request $request) {
//     //
// });


Route::get('/calendario', function () {
    $users = DB::table('users')->get();

    $events = [];
    foreach ($users as $user) {
        $events[] = [
            'title' => $user->name,
            'start' => date('Y-m-d', strtotime($user->created_at)),
            // 'start'=> '2023-04-21'
        ];
    }

    return response()->json($events);
});

