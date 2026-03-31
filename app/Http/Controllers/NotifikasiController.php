<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($request->filter === 'belum') {
            $notifikasi = $user->unreadNotifications()->latest()->paginate(10);
        } elseif ($request->filter === 'sudah') {
            
            $notifikasi = $user->notifications()->whereNotNull('read_at')->latest()->paginate(10);
        } else {
            $notifikasi = $user->notifications()->latest()->paginate(10);
        }

        return view('notifikasi.index', compact('notifikasi'));
    }

    public function markAsRead($id)
    {
        $notif = auth()->user()->notifications()->where('id', $id)->firstOrFail();
        $notif->markAsRead();

        return redirect()->route('kerusakan.show', $notif->data['kerusakan_id']);
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return back()->with('success', 'Semua notifikasi telah dibaca.');
    }
}