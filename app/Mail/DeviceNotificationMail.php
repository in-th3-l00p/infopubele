<?php

namespace App\Mail;

use App\Models\Slot;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DeviceNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Slot $slot) {
    }

    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Notificare dispozitiv',
        );
    }

    public function content(): Content {
        return new Content(
            view: 'emails.device-notification',
        );
    }

    public function attachments(): array {
        return [];
    }
}
