<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TypeAsset;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeAssetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any TypeAsset.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_type_asset');
    }

    /**
     * Determine whether the user can view a specific TypeAsset.
     */
    public function view(User $user, TypeAsset $typeAsset): bool
    {
        return $user->can('view_type_asset');
    }

    /**
     * Determine whether the user can create TypeAsset.
     */
    public function create(User $user): bool
    {
        return $user->can('create_type_asset');
    }

    /**
     * Determine whether the user can update a TypeAsset.
     */
    public function update(User $user, TypeAsset $typeAsset): bool
    {
        return $user->can('update_type_asset');
    }

    /**
     * Determine whether the user can delete a TypeAsset.
     */
    public function delete(User $user, TypeAsset $typeAsset): bool
    {
        return $user->can('delete_type_asset');
    }

    /**
     * Determine whether the user can bulk delete TypeAssets.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_type_asset');
    }

    /**
     * Determine whether the user can restore a TypeAsset.
     */
    public function restore(User $user, TypeAsset $typeAsset): bool
    {
        return $user->can('restore_type_asset');
    }

    /**
     * Determine whether the user can bulk restore TypeAssets.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_type_asset');
    }

    /**
     * Determine whether the user can replicate a TypeAsset.
     */
    public function replicate(User $user, TypeAsset $typeAsset): bool
    {
        return $user->can('replicate_type_asset');
    }

    /**
     * Determine whether the user can reorder TypeAssets.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_type_asset');
    }
}
