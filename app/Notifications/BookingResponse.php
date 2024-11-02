<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingResponse extends Notification
{
    use Queueable;

    protected $booking;
    protected $action;

    public function __construct($booking, $action)
    {
        $this->booking = $booking;
        $this->action = $action;
    }

    public function via($notifiable)
    {
        return ['mail']; // You can also add 'database' or other channels
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Booking ' . ucfirst($this->action))
            ->greeting('Hello!')
            ->line('Your booking for ' . $this->booking->event_name . ' has been ' . $this->action . '.')
            ->action('View Booking', url('/bookings/' . $this->booking->id))
            ->line('Thank you for using our application!');
    }
}
