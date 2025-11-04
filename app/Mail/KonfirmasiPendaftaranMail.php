<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\PendaftaranLomba;

class KonfirmasiPendaftaranMail extends Mailable
{
    use Queueable, SerializesModels;

    // Properti publik untuk bisa diakses di view email
    public $pendaftaran;

    /**
     * Create a new message instance.
     *
     * @param PendaftaranLomba $pendaftaran
     */
    public function __construct(PendaftaranLomba $pendaftaran)
    {
        $this->pendaftaran = $pendaftaran;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmasi Pendaftaran Lomba',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.konfirmasi-pendaftaran', // ganti dengan nama blade email kamu
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
