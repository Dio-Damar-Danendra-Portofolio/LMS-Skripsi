<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifikasiKelas extends Notification
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
                    ->line('Kelas akan berlangsung dalam beberapa menit')
                    ->line('Rincian: ')
                    ->line('Mata Pelajaran: {MataPelajaran}')
                    ->line('Jenis Pertemuan: {JenisPertemuan}')
                    ->line('Waktu Pertemuan: {WaktuPertemuan}')
                    ->line('Ruang Belajar: {RuangBelajar}')
                    ->line('Anda harus Segera hadir ruangan yang tertera dan jangan lupa untuk melakukan check-in')
                    ->action('Tampilkan Materi dari Mata Pelajaran', url('NamaMataPelajaran/materi'));
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
