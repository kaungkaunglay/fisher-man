<?php

use App\Helpers\AuthHelper;

if (!function_exists('permission_checker')) {
    function permission_checker($permission_id)
    {
        // Check if the user is authenticated first
        if (!AuthHelper::check()) {
            return false;
        }

        // Get the authenticated user
        $user = AuthHelper::user();

        // Check if the user has roles, and get the first role
        $user_role = $user->roles()->first(); // Assuming user has only one role

        if (!$user_role) {
            return false;
        }

        // Get the user's permissions and check if the permission exists
        $user_permissions = $user_role->permissions;

        return $user_permissions->contains('id', $permission_id);
    }
}
