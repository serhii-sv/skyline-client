<?php

namespace App\Mail;

use App\Models\Language;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(Setting::getValue('email'))
            ->to($this->user->email)
            ->subject('Регистрация')
            ->view('customer.email.registration-notification', [
                'user' => $this->user,
                'languages' => Language::all()
            ]);
    }
}
