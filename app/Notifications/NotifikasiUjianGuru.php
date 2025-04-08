<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifikasiUjianGuru extends Notification
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
                    ->line('Anda akan mengawas Ujian yang diadakan pada jam H:i:s')
                    ->line('Rincian: ')
                    ->line('Jenis Ujian: {JenisUjian}')
                    ->line('Waktu Ujian: {WaktuUjian}')
                    ->line('Ruang Ujian: {RuangUjian}')
                    ->line('Mata Pelajaran: {MataPelajaran}')
                    ->line('Peruntukan Kelas: {PeruntukanKelas}')
                    ->line('Anda harus menghadiri ruang ujian sebelum waktu ujian telah tiba untuk mengawas Ujian')
                    ->action('Tampilkan Sesi Ujian', url('pengawasan-ujian'));
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
