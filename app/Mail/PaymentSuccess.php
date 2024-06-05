<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $offerName;
    public $amountInUsd;

    public function __construct(User $user, $offerName, $amountInUsd)
    {
        $this->user = $user;
        $this->offerName = $offerName;
        $this->amountInUsd = $amountInUsd;
    }

    public function build()
    {
        return $this->view('emails.payment_success')
                    ->subject('Payment Successful')
                    ->with([
                        'user' => $this->user,
                        'offerName' => $this->offerName,
                        'amountInUsd' => $this->amountInUsd
                    ]);
    }
}