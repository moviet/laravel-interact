<?php

namespace App\Models;

use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use Notifiable;

    /**
     * Disable auto timestamp
     *
     * @return false
     */
    public $timestamps = false;

    /**
     * Generate post dates
     *
     * @return false
     */
    protected $guarded = [
        'id', 'token', 'posted_at', 'ip',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'division', 'message', 'token', 'posted_at', 'ip',
    ];

    /**
     * Disable auto incrementing
     *
     * @return false
     */
    public $incrementing = false;

    /**
     * Send notification after sent
     *
     * @param string $email
     * @param string $message
     * @return App\Models\Contact
     */
    public function sendEmail($email, $message)
    {
        return Mail::to($email)
            ->send(new EmailNotification($message));
    }
}
