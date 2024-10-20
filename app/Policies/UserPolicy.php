<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "operator" ||
            $user->role === "uat";
    }

    public function view(User $user, User $model): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "operator" ||
            $user->role === "uat" && $user->city === $model->city;
    }

    public function create(User $user): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "operator" ||
            $user->role === "uat";
    }

    public function update(User $user, User $model): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "operator" ||
            $user->role === "uat" && $user->city === $model->city && $user->role !== "admin";
    }

    public function delete(User $user, User $model): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "operator" ||
            $user->role === "uat" && $user->city === $model->city;
    }

    public function restore(User $user, User $model): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "operator" ||
            $user->role === "uat" && $user->city === $model->city;
    }

    public function forceDelete(User $user, User $model): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "operator" ||
            $user->role === "uat" && $user->city === $model->city;
    }
}
