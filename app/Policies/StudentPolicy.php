<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Student;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization,AdminActions;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $student
     * @return mixed
     */
    public function view(User $user, Student $student)
    {
        return $user->id === $student->id;
    }


    public function enrollment(User $user, Student $student)
    {
        return $user->id === $student->id;
        
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $student
     * @return mixed
     */
    public function update(User $user, Student $student)
    {
        return $user->id === $student->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $student
     * @return mixed
     */
    public function delete(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $student
     * @return mixed
     */
    public function restore(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Student  $student
     * @return mixed
     */
    public function forceDelete(User $user, Student $student)
    {
        //
    }
}
