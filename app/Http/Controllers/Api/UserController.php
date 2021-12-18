<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $query = User::query();
        $query->where('enabled', 1);
        return UserResource::collection($query->paginate(5));
    }

    public function show(User $user)
    {
        return new UserResource($user->load('packages'));
    }
}
