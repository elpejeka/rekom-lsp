<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RekomendasiNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // $url = asset('//'.$this->invoice->id);
        // laravel/storage/app/public'. $this->data->surat_rekomendasi
        return (new MailMessage)
                    ->line('Surat Rekomendasi Lisensi sudah dapat di download')
                    ->action('Download', url('/laravel/storage/app/public/'. $this->data['surat_rekomendasi']))
                    ->line('Terimakasih sudah menggunakan Aplilkasi kami!');
    }

    public function toDatabase(){
        return [
            'message' => "Surat Rekomendasi telah terbit anda dapat mendownload"
        ];
    }   

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
