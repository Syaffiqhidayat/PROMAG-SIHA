<?php

namespace App\Notifications;

use App\Models\Kerusakan;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class KerusakanBaruNotification extends Notification
{
    use Queueable;

    public function __construct(public Kerusakan $kerusakan) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        $tanggal = $this->kerusakan->tgl_requst
            ? Carbon::parse($this->kerusakan->tgl_requst)->format('d M Y')
            : '-';

        $waktu = $this->kerusakan->waktu_requst ?? '-';

        return [
            'kerusakan_id'    => $this->kerusakan->id,
            'hardware'        => $this->kerusakan->hardwares->nama ?? '-',
            'unit'            => $this->kerusakan->units->nama ?? '-',
            'laporan'         => $this->kerusakan->laporan ?? '-',
            'pelapor'         => $this->kerusakan->users->name ?? auth()->user()->name ?? '-',

            // Kedua key ini disimpan agar kompatibel di semua view
            'tanggal'         => $tanggal,
            'tanggal_request' => $tanggal,
            'waktu_request'   => $waktu,
        ];
    }
}