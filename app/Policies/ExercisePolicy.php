<?php

namespace App\Policies;

use App\Models\Group;
use App\User;
use App\Models\Exercise;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ExercisePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the exercise.
     *
     * @param  \App\User  $user
     * @param  \App\Exercise  $exercise
     * @return mixed
     */
    public function view(User $user, Exercise $exercise)
    {
        //
    }

    /**
     * Determine whether the user can create exercises.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Exercise $exercise)
    {
        return $exercise->group->id == Auth::user()->id;
    }

    /**
     * Determine whether the user can update the exercise.
     *
     * @param  \App\User  $user
     * @param  \App\Exercise  $exercise
     * @return mixed
     */
    public function update(User $user, Exercise $exercise)
    {
        //
    }

    /**
     * Determine whether the user can delete the exercise.
     *
     * @param  \App\User  $user
     * @param  \App\Exercise  $exercise
     * @return mixed
     */
    public function delete(User $user, Exercise $exercise)
    {
        return $user->id == $exercise->user_id;
    }

    /**
     * Determine whether the user can restore the exercise.
     *
     * @param  \App\User  $user
     * @param  \App\Exercise  $exercise
     * @return mixed
     */
    public function restore(User $user, Exercise $exercise)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the exercise.
     *
     * @param  \App\User  $user
     * @param  \App\Exercise  $exercise
     * @return mixed
     */
    public function forceDelete(User $user, Exercise $exercise)
    {

    }
}
