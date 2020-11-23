<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Student;
use App\Mail\UserCreated;
use App\Models\Enrollment;
use App\Mail\UserMailChanged;
use App\Mail\VoucherMailChanged;
use App\Mail\VoucherMailDisapproved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        User::created(function($user){
            retry(5, function() use ($user){
                Mail::to($user)->send(new UserCreated($user));
            },100);
        });

        User::updated(function($user){
            if ($user->isDirty('email')){
                retry(5,function() use($user){
                    Mail::to($user)->send(new UserMailChanged($user));
                },100);
            }
        });

        Enrollment::updated(function($enrollment){
            if ($enrollment->isDirty('state')){
                $user = User::findOrFail($enrollment->student_id);
                $student = Student::findOrFail($enrollment->student_id);
                if($enrollment->state === Enrollment::STATE_PROGRESS){
                    retry(5,function() use($user,$student){
                        Mail::to($user)->send(new VoucherMailChanged($user,$student));
                    },100);
                }else if($enrollment->state === Enrollment::STATE_DISAPPROVED){
                    retry(5,function() use($user,$student){
                        Mail::to($user)->send(new VoucherMailDisapproved($user,$student));
                    },100);
                } else{}
                
            }
        });
    }
}
