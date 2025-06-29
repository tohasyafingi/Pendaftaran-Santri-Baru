<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
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
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
            'img'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('judul', 'isi');

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('pengumuman', 'public');
        }

        Pengumuman::create($data);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil dikirim.');
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
