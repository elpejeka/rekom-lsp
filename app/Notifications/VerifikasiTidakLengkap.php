<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifikasiTidakLengkap extends Notification
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
                    ->line('Mohon Perbaiki Dokumen Permohonan Anda Pada Portal:')
                    ->line('Thank you for using our application!');
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

            // if(count($this->data['keterangan_surat']) == 0){
        //     $surat = "-";
        // }
        // $surat = $this->data['keterangan_surat'];

        // if(count($this->data['keterangan_asosiasi']) == 0){
        //     $asosiasi = '-';
        // }
        // $asosiasi = $this->data['keterangan_asosiasi'];

        // if(count($this->data['keterangan_organisasi']) == 0){
        //     $organisasi = '-';
        // }
        // $organisasi = $this->data['keterangan_organisasi'];

        // if(count($this->data['keterangan_klasifikasi']) == 0){
        //     $klasifikasi = '-';
        // }
        // $klasifikasi = $this->data['keterangan_klasifikasi'];

        // if(count($this->data['keterangan_skema']) == 0){
        //     $skema = '-';
        // }
        // $skema = $this->data['keterangan_skema'];
        
        // if(count($this->data['keterangan_asesor']) == 0){
        //     $asesor = '-';
        // }
        // $asesor = $this->data['keterangan_asesor'];

        // if(count($this->data['keterangan_akta']) == 0){
        //     $akta = '-';
        // }
        // $akta = $this->data['keterangan_akta'];

        // if(count($this->data['keterangan_komitmen']) == 0){
        //     $komitmen = '-';
        // }
        // $komitmen = $this->data['keterangan_komitmen'];

        // if(count($this->data['keterangan_tuk']) == 0){
        //     $tuk = '-';
        // }
        // $tuk = $this->data['keterangan_tuk'];

        // if(count($this->data['keterangan_sk']) == 0){
        //     $sk = '-';
        // }
        // $sk = $this->data['keterangan_sk'];

        // if(count($this->data['keterangan_laporan']) == 0){
        //     $laporan = '-';
        // }
        // $laporan = $this->data['keterangan_laporan'];

        // if(count($this->data['keterangan_akreditasi']) == 0){
        //     $akreditasi = '-';
        // }
        // $akreditasi = $this->data['keterangan_akreditasi'];

        // if(count($this->data['keterangan_rekapitulasi']) == 0){
        //     $rekapitulasi = '-';
        // }
        // $rekapitulasi = $this->data['keterangan_rekapitulasi'];

        // if(count($this->data['keterangan_acuan']) == 0){
        //     $acuan = '-';
        // }
        // $acuan = $this->data['keterangan_acuan'];
}
