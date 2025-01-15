<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminBookingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $admin_booking_confirmation_mail_data;
    public $admin_mail_subject;

    /**
     * Create a new message instance.
     */
    public function __construct($admin_booking_confirmation_mail_data, $admin_mail_subject)
    {
        $this->admin_booking_confirmation_mail_data = $admin_booking_confirmation_mail_data;
        $this->admin_mail_subject = $admin_mail_subject;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->admin_mail_subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_booking_confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
