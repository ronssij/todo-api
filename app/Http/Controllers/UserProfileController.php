<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index()
    {
        return UserResource::make(user()->load('lists'));
    }
}
