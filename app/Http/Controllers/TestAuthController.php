<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TestAuthController extends Controller
{
    public function showForm()
    {
        return view('test-register');
    }

    public function register(Request $request)
    {
        // Reuse the API controller logic directly
        $apiController = app(\App\Http\Controllers\Api\AuthController::class);

        $response = $apiController->register($request);

        // API returns JsonResponse
        $data = $response->getData(true);

        return redirect()
            ->to(config('app.firebase_forwarded_url').'/test-register')
            ->with('success', 'Registered successfully. Token: ' . $data['token']);
    }

}
