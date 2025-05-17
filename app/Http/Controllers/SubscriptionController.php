<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class SubscriptionController extends Controller
{
    public function subscribe(UserService $service)
    {
        $service->subscribe(auth()->user());
        return redirect()->route('dashboard');
    }
}
