<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return UserResource::make(auth()->user());
    }
}
