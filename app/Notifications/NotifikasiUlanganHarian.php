<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifikasiUlanganHarian extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Ulangan Harian akan tiba dalam beberapa menit... Segera masuk ke kelas Anda sebelum terlambat')
                    ->line('Rincian: ')
                    ->line('Jenis Ulangan Harian: {JenisUlanganHarian}')
                    ->line('Waktu Ulangan Harian: {WaktuUlanganHarian}')
                    ->line('Peruntukan Kelas: {PeruntukanKelas}')
                    ->action('Tampilkan Daftar Ulangan Harian', url('NamaMataPelajaran/materi/ulangan-harian'));
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
