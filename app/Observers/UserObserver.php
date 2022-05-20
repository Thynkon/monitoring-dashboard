<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "forceDeleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }

    // Set default user id
    // Somehow, if the id is set to gen_random_text_uuid(), cratedb does not match strings
    // Ie. where('id', '<ID_GENERATED_BY_CRATEDB>') returns null!!!!
    // This is a temporary fix as the id should be generated by the database
    // Reference: https://stackoverflow.com/a/43127168
    public function saving(User $user)
    {
        if (!isset($user->id) || is_null($user->id)) {
            $user->setAttribute('id', User::generateUUID());
        }
    }
}
