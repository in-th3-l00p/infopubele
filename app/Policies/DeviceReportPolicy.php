<?php

namespace App\Policies;

use App\Models\DeviceReport;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DeviceReportPolicy
{
    public function viewAny(User $user): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "generator";
    }

    public function view(User $user, DeviceReport $deviceReport): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "generator";
    }

    public function create(User $user): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "generator";
    }

    public function update(User $user, DeviceReport $deviceReport): bool
    {
        return false;
    }

    public function delete(User $user, DeviceReport $deviceReport): bool
    {
        return $user->role === "admin";
    }

    public function restore(User $user, DeviceReport $deviceReport): bool
    {
        return $user->role === "admin";
    }

    public function forceDelete(User $user, DeviceReport $deviceReport): bool
    {
        return $user->role === "admin";
    }
}
