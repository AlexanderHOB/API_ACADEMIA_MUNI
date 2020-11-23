<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VoucherMailDisapproved extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $student;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,Student $student)
    {
        $this->user = $user;
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.enrollment')->subject("Matrícula Aprobada - Academia Municipal El Tambo");

    }
}
