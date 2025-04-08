<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifikasiJadwalKelas extends Notification
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
                    ->line('Sesi kelas akan dimulai dalam beberapa menit')
                    ->line('Anda harus Segera hadir ruangan yang tertera dan jangan lupa untuk melakukan check-in')
                    ->line('atau menjawab Utas (Thread) yang menjadi tugas dalam Forum, ya...')
                    ->line('Rincian: ')
                    ->line('Mata Pelajaran: {MataPelajaran}')
                    ->line('Jenis Pertemuan: {JenisPertemuan}')
                    ->line('Waktu Pertemuan: {WaktuPertemuan}')
                    ->line('Ruang Belajar: {RuangBelajar}')
                    ->action('Tampilkan Rincian Materi Mata Pelajaran', url('NamaMataPelajaran/materi'));
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
