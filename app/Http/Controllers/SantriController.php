<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $santris = Santri::latest()->get();
        $santris = Santri::latest()->get();
        return view('backend.santri.daftar', compact('santris'));
    }
    public function dashboard(Request $request)
    {
        $santri = Santri::where('email', $request->user()->email)->firstOrFail();
        return view('backend.dataSantri.dashboard', compact('santri'));
    }
    public function indexDitolak()
    {
        $santris = Santri::where('status', 'tolak')->get();
        return view('backend.santri.tolak', compact('santris'));
    }
    public function indexDiterima()
    {
        $santris = Santri::where('status', 'terima')->get();
        return view('backend.santri.terima', compact('santris'));
    }
    public function indexDaftarUlang()
    {
        $santris = Santri::where('status', 'aktif')->get();
        return view('backend.santri.daftar-ulang', compact('santris'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.formulir');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_lengkap'     => 'required|string|max:255',
                'nik'              => 'required|digits_between:12,20',
                'jenis_kelamin'    => 'required|in:L,P',
                'tempat_lahir'     => 'required|string|max:255',
                'tanggal_lahir'    => 'required|date',
                'no_hp'            => 'required|digits_between:10,15',
                'email'            => 'required|email|unique:users,email|unique:santris,email',
                'alamat'           => 'required|string',
                'nama_ayah'        => 'required|string|max:255',
            ]);

            $validated['tanggal_pendaftaran'] = now();
            $validated['status'] = 'proses';

            // Generate nomor pendaftaran
            $attempt = 0;
            do {
                $nomor = $this->generateNomorPendaftaran();
                $attempt++;

                if ($attempt > 5) {
                    throw new Exception("Gagal menghasilkan nomor unik. Silakan coba lagi.");
                }
            } while (Santri::where('nomor_pendaftaran', $nomor)->exists());
            $validated['nomor_pendaftaran'] = $nomor;

            // Simpan ke tabel santris
            $santri = Santri::create($validated);

            // Buat akun user (login)
            User::create([
                'name'     => $validated['nama_lengkap'],
                'email'    => $validated['email'],
                'role'    => 'santri',
                'password' => Hash::make($nomor),
            ]);

            // Sukses
            return redirect('/')->with('success', 'Pendaftaran berhasil. Nomor Pendaftaran Anda: ' . $nomor);
        } catch (Exception $e) {
            // \Log::error('Gagal daftar santri: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Pendaftaran gagal. Silakan coba lagi.');
        }
    }
    private function generateNomorPendaftaran()
    {
        $prefix = 'REG';
        $date = now(); // Ambil tanggal saat ini

        $year = $date->format('y');   // 2 digit tahun → 25
        $day  = $date->format('d');   // 2 digit tanggal → 25

        // Hitung jumlah santri yang daftar di hari ini
        $jumlahHariIni = Santri::whereDate('created_at', $date->toDateString())->count() + 1;

        if ($jumlahHariIni > 99) {
            throw new Exception("Batas pendaftaran harian tercapai (maks 99 orang).");
        }

        $nomorUrut = str_pad($jumlahHariIni, 2, '0', STR_PAD_LEFT); // 01, 02, ..., 99

        return $prefix . $year . $day . $nomorUrut;
    }

    public function formIdentitas(Request $request)
    {
        $santri = Santri::where('email', $request->user()->email)->firstOrFail();
        return view('backend.dataSantri.identitas', compact('santri'));
    }

    public function updateIdentitas(Request $request)
    {
        $santri = Santri::where('email', $request->user()->email)->firstOrFail();

        $data = $request->validate([
            'nama_lengkap'     => 'required|string|max:255',
            'jenis_kelamin'    => 'required|in:L,P',
            'tempat_lahir'     => 'required|string',
            'tanggal_lahir'    => 'required|date',
            'no_hp'            => 'required|string|max:15',
            'alamat'           => 'required|string',

            'nama_ayah'        => 'nullable|string',
            'pekerjaan_ayah'   => 'nullable|string',
            'pendidikan_ayah'  => 'nullable|string',
            'nama_ibu'         => 'nullable|string',
            'pekerjaan_ibu'    => 'nullable|string',
            'pendidikan_ibu'   => 'nullable|string',
            'alamat_orangtua'  => 'nullable|string',
            'no_hp_orangtua'   => 'nullable|string|max:15',
            'nama_wali'        => 'nullable|string',
            'hubungan_wali'    => 'nullable|string',
        ]);

        if ($request->hasFile('pas_foto')) {
            $data['pas_foto'] = $request->file('pas_foto')->store('berkas/foto', 'public');
        }
        if ($request->hasFile('kk')) {
            $data['kk'] = $request->file('kk')->store('berkas/kk', 'public');
        }
        if ($request->hasFile('akta_kelahiran')) {
            $data['akta_kelahiran'] = $request->file('akta_kelahiran')->store('berkas/akta', 'public');
        }
        if ($request->hasFile('bukti_daftar')) {
            $data['bukti_daftar'] = $request->file('bukti_daftar')->store('berkas/bukti_daftar', 'public');
        }

        $santri->update($data);

        return redirect()->route('santri.identitas')->with('success', 'Data berhasil diperbarui.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Santri $santri)
    {
        return view('backend.santri.show', compact('santri'));
    }
    public function update(Request $request, Santri $santri)
    {
        $data = $request->validate([
            'nis' => 'nullable|string|max:20|unique:santris,nis,' . $santri->id,
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'no_hp' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',

            'nama_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'pendidikan_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'pendidikan_ibu' => 'nullable|string|max:255',
            'alamat_orangtua' => 'nullable|string',
            'no_hp_orangtua' => 'nullable|string|max:15',

            'nama_wali' => 'nullable|string|max:255',
            'hubungan_wali' => 'nullable|string|max:255',

            'info' => 'nullable|string|max:255',
            'status' => 'required|in:proses,terima,tolak,aktif',
        ]);

        // Upload berkas jika diupload
        foreach (['pas_foto', 'kk', 'akta_kelahiran', 'bukti_daftar', 'bukti_daftar_ulang'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('berkas/' . $field, 'public');
            }
        }

        // Logika status dan NIS
        if ($data['status'] === 'aktif' && !$santri->nis) {
            $data['nis'] = $this->generateNIS();
        }

        $santri->update($data);

        return redirect()->route('backend.santri.detail', $santri->id)->with('success', 'Data santri berhasil diperbarui.');
    }
    public function kirimPesan(Request $request, Santri $santri)
    {
        $request->validate([
            'info' => 'nullable|string|max:255',
        ]);

        $santri->info = $request->info;
        $santri->save();

        return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
    }

    public function formDaftarUlang(Request $request)
    {
        $santri = Santri::where('email', $request->user()->email)
            // ->where('status', 'terima')
            ->firstOrFail();

        return view('backend.dataSantri.daftarUlang', compact('santri'));
    }

    public function prosesDaftarUlang(Request $request)
    {
        $santri = Santri::where('email', $request->user()->email)
            ->where('status', 'terima')
            ->firstOrFail();

        $validated = $request->validate([
            'bukti_daftar_ulang' => 'required|file|max:2048|mimes:jpg,jpeg,png,pdf',
        ]);

        if ($request->hasFile('bukti_daftar_ulang')) {
            $validated['bukti_daftar_ulang'] = $request->file('bukti_daftar_ulang')->store('berkas/daftar_ulang', 'public');
        }

        $santri->update($validated);

        return redirect()->route('santri.dashboard')->with('success', 'Daftar ulang berhasil. Menunggu verifikasi admin.');
    }


    /**
     * Generate NIS format: NIS25XXXX
     */
    private function generateNIS()
    {
        $prefix = 'NIS' . now()->format('y');
        $lastSantri = Santri::whereNotNull('nis')
            ->where('nis', 'like', $prefix . '%')
            ->orderBy('nis', 'desc')
            ->first();

        if ($lastSantri && preg_match('/(\d{4})$/', $lastSantri->nis, $matches)) {
            $lastNumber = (int)$matches[1];
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
    public function destroy(Santri $santri)
    {
        try {
            $santri->delete();
            return back()->with('success', 'Data santri berhasil dihapus.');
        } catch (Exception $e) {
            Log::error('Gagal hapus santri: ' . $e->getMessage());
            return back()->with('error', 'Gagal menghapus santri.');
        }
    }
}
