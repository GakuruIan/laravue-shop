<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected Order $order;
    protected $CustomerDetails;

    public function __construct($order,$CustomerDetails){
       $this->order = $order;
       $this->CustomerDetails = $CustomerDetails;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Order Email',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.Orders.Placed',
            with: [
                  'order'=>$this->order,
                 'Customer'=>$this->CustomerDetails
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
