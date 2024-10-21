<?php

namespace App\Policies;

use App\Models\Device;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DevicePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Device $device): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "uat" && $user->city === $device->city ||
            $user->role === "user" && $user->device_id === $device->id ||
            $user->role === "operator" && $user->associatedDevices->contains($device);
    }

    public function create(User $user): bool
    {
        return $user->role === "admin" || $user->role === "uat";
    }

    public function update(User $user, Device $device): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "uat" && $user->city === $device->city ||
            $user->role === "operator" && $user->associatedDevices->contains($device);
    }

    public function delete(User $user, Device $device): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "uat" && $user->city === $device->city;
    }

    public function restore(User $user, Device $device): bool
    {
        return
            $user->role === "admin" ||
            $user->role === "uat" && $user->city === $device->city;
    }

    public function forceDelete(User $user, Device $device): bool
    {
        return $user->role === "admin";
    }
}
