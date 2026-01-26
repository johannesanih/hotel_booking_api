<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class MigrationRunnerController extends Controller
{
    public function run()
    {
        Artisan::call('migrate', ['--force' => true]);

        return response()->json([
            'status' => 'success',
            'message' => 'Migrations executed successfully'
        ]);
    }
}
