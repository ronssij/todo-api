<?php

if (!function_exists('user')) {
    /**
     * Get the currently authenticated user.
     *
     * @return App\Models\User|null
     */
    function user()
    {
        return auth()->user();
    }
}
