<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;

class AuthUserController extends Controller
{
    public function show()
    {
        return new UserResource(auth()->user());
    }
}
