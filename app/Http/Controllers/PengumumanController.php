<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();
        return view('backend.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('backend.pengumuman.create');
    }
public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'status_santri' => 'required'
    ]);

    // Simpan pengumuman
    $pengumuman = new Pengumuman();
    $pengumuman->judul = $request->judul;
    $pengumuman->isi = $request->isi;

    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('pengumuman'), $filename);
        $pengumuman->img = $filename;
    }

    $pengumuman->save();

    // Kirim kepada santri sesuai status
    $status = strtolower($request->status_santri);
    $valid_statuses = ['proses', 'terima', 'tolak', 'aktif'];

    if ($status == 'semua') {
        $santri = Santri::all();
    } elseif (in_array($status, $valid_statuses)) {
        $santri = Santri::where('status', $status)->get();
    } else {
        return back()->withErrors(['status_santri' => 'Status tidak valid']);
    }

    if ($santri->isEmpty()) {
        return back()->with('warning', 'Tidak ada santri dengan status tersebut.');
    }

    foreach ($santri as $s) {
        $s->pengumuman()->attach($pengumuman->id);
    }

    return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan dan dikirim.');
}

    public function destroy(Pengumuman $pengumuman)
    {
        if ($pengumuman->img) {
            Storage::disk('public')->delete($pengumuman->img);
        }

        $pengumuman->delete();

        return back()->with('success', 'Pengumuman dihapus.');
    }
}
