<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RecruitThankYouMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '応募受付が完了しました。'
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.recruit.thank-you'
        );
    }
}
