<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TypeDevice;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeDevicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any TypeDevice.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_type_device');
    }

    /**
     * Determine whether the user can view a specific TypeDevice.
     */
    public function view(User $user, TypeDevice $typeDevice): bool
    {
        return $user->can('view_type_device');
    }

    /**
     * Determine whether the user can create TypeDevice.
     */
    public function create(User $user): bool
    {
        return $user->can('create_type_device');
    }

    /**
     * Determine whether the user can update a TypeDevice.
     */
    public function update(User $user, TypeDevice $typeDevice): bool
    {
        return $user->can('update_type_device');
    }

    /**
     * Determine whether the user can delete a TypeDevice.
     */
    public function delete(User $user, TypeDevice $typeDevice): bool
    {
        return $user->can('delete_type_device');
    }

    /**
     * Determine whether the user can bulk delete TypeDevices.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_type_device');
    }

    /**
     * Determine whether the user can restore a TypeDevice.
     */
    public function restore(User $user, TypeDevice $typeDevice): bool
    {
        return $user->can('restore_type_device');
    }

    /**
     * Determine whether the user can bulk restore TypeDevices.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_type_device');
    }

    /**
     * Determine whether the user can replicate a TypeDevice.
     */
    public function replicate(User $user, TypeDevice $typeDevice): bool
    {
        return $user->can('replicate_type_device');
    }

    /**
     * Determine whether the user can reorder TypeDevices.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_type_device');
    }
}
