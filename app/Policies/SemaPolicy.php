<?php

namespace App\Policies;

use App\Models\Sema;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SemaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Sema $sema): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Sema $sema): bool
    {
        return $sema->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Sema $sema): bool
    {
        return $this->update($user, $sema);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Sema $sema): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Sema $sema): bool
    {
        //
    }
}
