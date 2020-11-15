<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Voucher;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;

class VoucherPolicy
{
    use HandlesAuthorization, AdminActions;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function enrollment(User $user, Voucher $voucher)
    {
        return $user->id === $voucher->enrollment->student_id;
        
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Voucher  $voucher
     * @return mixed
     */
    public function view(User $user, Voucher $voucher)
    {
        return $user->id === $voucher->enrollment->student_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Voucher  $voucher
     * @return mixed
     */
    public function update(User $user, Voucher $voucher)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Voucher  $voucher
     * @return mixed
     */
    public function destroy(User $user, Voucher $voucher)
    {
        return $user->id === $voucher->enrollment->student_id;
    }

}
