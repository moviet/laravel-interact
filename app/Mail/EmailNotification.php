<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Middleware\CheckIdentification;

class EmailNotification extends Mailable
{
    use Queueable, SerializesModels, CheckIdentification;

    protected $name;

    /**
     * Create a new message instance.
     *
     * @param App\Models\Contact $name
     */
    public function __construct(Contact $name)
    {
        $this->contact = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mailer, $this->interact)
                    ->with([
                        'name'   => $this->contact->name,
                        'notice' => $this->interact,
                    ])
                    ->subject('Interact QA')
                    ->view('layouts.notify');
    }
}
