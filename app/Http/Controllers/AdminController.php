<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\Pengumuman;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard.admin', [
            'totalSantri' => Santri::count(),
            'diterima' => Santri::where('status', 'terima')->count(),
            'ditolak' => Santri::where('status', 'tolak')->count(),
            'proses' => Santri::where('status', 'proses')->count(),
            'pendaftarTerbaru' => Santri::latest()->take(5)->get(),
            'pengumumanTerbaru' => Pengumuman::latest()->take(5)->get(),
            'calendarEvents' => Pengumuman::get()->map(function ($p) {
                return [
                    'title' => $p->judul,
                    'start' => optional($p->created_at)->toDateString(),
                ];
            }),
            'logs' => Activity::latest()->take(5)->get(),
        ]);
    }
    public function logs()
    {
        $logs = Activity::with('causer')->latest()->get();
        return view('backend.log', compact('logs'));
    }
}
