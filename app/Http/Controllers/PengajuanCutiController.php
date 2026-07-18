<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanCutiController extends Controller
{
    private const TOTAL_CUTI_TAHUNAN = 12;

    private function hitungSisaCuti($user)
    {
        $cutiDipakai = PengajuanCuti::where('user_id', $user->id)
            ->where('jenis_cuti', 'cuti_tahunan')
            ->where('status', 'approved')
            ->whereYear('tanggal_mulai', now()->year)
            ->sum('jumlah_hari');

        return max(0, self::TOTAL_CUTI_TAHUNAN - $cutiDipakai);
    }

    public function dashboard()
    {
        $user = Auth::user();

        $cutiSaya = PengajuanCuti::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $totalCutiTahunan = self::TOTAL_CUTI_TAHUNAN;
        $sisaCuti = $this->hitungSisaCuti($user);

        $pending = PengajuanCuti::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();

        $approved = PengajuanCuti::where('user_id', $user->id)
            ->where('status', 'approved')
            ->count();

        $pengumuman = Pengumuman::with('creator')
            ->latest()
            ->take(3)
            ->get();

        return view('employee.dashboard', compact(
            'cutiSaya',
            'totalCutiTahunan',
            'sisaCuti',
            'pending',
            'approved',
            'pengumuman'
        ));
    }

    public function diterima(Request $request, PengajuanCuti $cuti)
    {
        if ($cuti->status != 'pending') {
            return back()->with('alert', [
                'type' => 'error',
                'title' => 'Gagal',
                'message' => 'Pengajuan sudah diproses.',
            ]);
        }

        if (now()->toDateString() > Carbon::parse($cuti->tanggal_selesai)->toDateString()) {
            return back()->with('alert', [
                'type' => 'error',
                'title' => 'Tidak Dapat Disetujui',
                'message' => 'Pengajuan cuti sudah melewati tanggal berakhir sehingga tidak dapat disetujui.',
            ]);
        }

        $request->validate([
            'catatan_hrd' => 'nullable|string|max:500',
        ]);

        $cuti->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
            'catatan_hrd' => $request->catatan_hrd,
        ]);

        return back()->with('alert', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Pengajuan cuti berhasil disetujui.',
        ]);
    }

    public function ditolak(Request $request, PengajuanCuti $cuti)
    {
        if ($cuti->status != 'pending') {
            return back()->with('alert', [
                'type' => 'error',
                'title' => 'Gagal',
                'message' => 'Pengajuan sudah diproses.',
            ]);
        }

        $request->validate([
            'catatan_hrd' => 'required|string|max:500',
        ], [
            'catatan_hrd.required' => 'Alasan penolakan wajib diisi.',
        ]);

        $cuti->update([
            'status' => 'rejected',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
            'catatan_hrd' => $request->catatan_hrd,
        ]);

        return back()->with('alert', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Pengajuan cuti berhasil ditolak.',
        ]);
    }

    public function daftarCutiHRD()
    {
        $cuti = PengajuanCuti::with([
            'user.department',
            'approver',
        ])->latest()->get();

        return view('hrd.daftar_cuti', compact('cuti'));
    }

    public function create()
    {
        $sisaCuti = $this->hitungSisaCuti(Auth::user());

        return view('employee.pengajuan_cuti_create', compact('sisaCuti'));
    }

    public function riwayat()
    {
        $cutiSaya = PengajuanCuti::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('employee.riwayat_cuti', compact('cutiSaya'));
    }

    private function hitungHariKerja($tanggalMulai, $tanggalSelesai)
    {
        $mulai = Carbon::parse($tanggalMulai);
        $selesai = Carbon::parse($tanggalSelesai);

        $hariKerja = 0;

        while ($mulai->lte($selesai)) {
            if (! $mulai->isWeekend()) {
                $hariKerja++;
            }

            $mulai->addDay();
        }

        return $hariKerja;
    }

    public function store(Request $request)
    {
        $this->validasiCuti($request);

        $user = Auth::user();

        $mulai = Carbon::parse($request->tanggal_mulai);
        if ($mulai->isPast() && ! $mulai->isToday()) {
            return back()->withInput()->with('alert', [
                'type' => 'error',
                'title' => 'Tanggal Tidak Valid',
                'message' => 'Tidak boleh memilih tanggal mulai di masa lalu.',
            ]);
        }

        $sedangCuti = PengajuanCuti::where('user_id', $user->id)->where('status', 'approved')->whereDate('tanggal_mulai', '<=', now())->whereDate('tanggal_selesai', '>=', now())->exists();

        if ($sedangCuti) {
            return back()->withInput()->with('alert', [
                'type' => 'error',
                'title' => 'Pengajuan Ditolak',
                'message' => 'Anda sedang menjalani cuti dan baru dapat mengajukan cuti kembali setelah cuti saat ini selesai.',
            ]);
        }

        $jumlahHari = $mulai->diffInDays(Carbon::parse($request->tanggal_selesai)) + 1;

        if ($request->jenis_cuti === 'cuti_penting') {

            $hariKerja = $this->hitungHariKerja(
                $request->tanggal_mulai,
                $request->tanggal_selesai
            );

            if ($hariKerja > 3) {
                return back()->withInput()->with('alert', [
                    'type' => 'error',
                    'title' => 'Pengajuan Ditolak',
                    'message' => 'Cuti penting maksimal 3 hari kerja.',
                ]);
            }
        }

        $cutiBentrok = PengajuanCuti::where('user_id', $user->id)
            ->whereIn('status', ['approved', 'pending'])
            ->where(function ($query) use ($request) {
                $query->whereBetween('tanggal_mulai', [
                    $request->tanggal_mulai,
                    $request->tanggal_selesai,
                ])
                    ->orWhereBetween('tanggal_selesai', [
                        $request->tanggal_mulai,
                        $request->tanggal_selesai,
                    ])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('tanggal_mulai', '<=', $request->tanggal_mulai)
                            ->where('tanggal_selesai', '>=', $request->tanggal_selesai);
                    });
            })
            ->exists();

        if ($cutiBentrok) {
            return back()->withInput()->with('alert', [
                'type' => 'error',
                'title' => 'Pengajuan Ditolak',
                'message' => 'Tanggal yang dipilih bertabrakan dengan pengajuan cuti yang sudah ada.',
            ]);
        }

        $pending = PengajuanCuti::where('user_id', $user->id)
            ->where('status', 'pending')
            ->exists();

        if ($pending) {
            return back()->with('alert', [
                'type' => 'error',
                'title' => 'Pengajuan Ditolak',
                'message' => 'Masih ada pengajuan cuti yang pending.',
            ]);
        }

        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti-cuti', 'public');
        }

        PengajuanCuti::create([
            'user_id' => $user->id,
            'jenis_cuti' => $request->jenis_cuti,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'jumlah_hari' => $jumlahHari,
            'alasan' => $request->alasan,
            'bukti' => $buktiPath,
            'status' => 'pending',
        ]);

        return redirect()->route('employee.dashboard')->with('alert', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Pengajuan cuti berhasil diajukan.',
        ]);
    }

    public function edit($id)
    {
        $cuti = PengajuanCuti::where('user_id', Auth::id())->findOrFail($id);

        if ($cuti->status != 'pending') {
            return redirect()->route('riwayat.cuti')->with('alert', [
                'type' => 'error',
                'title' => 'Tidak Bisa Edit',
                'message' => 'Cuti yang sudah diproses tidak bisa diubah.',
            ]);
        }

        $sisaCuti = $this->hitungSisaCuti(Auth::user());

        return view('employee.pengajuan_cuti_edit', compact('cuti', 'sisaCuti'));
    }

    public function update(Request $request, $id)
    {
        $cuti = PengajuanCuti::where('user_id', Auth::id())->findOrFail($id);

        if ($cuti->status != 'pending') {
            return back()->with('alert', [
                'type' => 'error',
                'title' => 'Gagal',
                'message' => 'Cuti tidak bisa diubah.',
            ]);
        }

        $this->validasiCuti($request);

        $mulai = Carbon::parse($request->tanggal_mulai);
        $jumlahHari = $mulai->diffInDays(Carbon::parse($request->tanggal_selesai)) + 1;

        $cutiBentrok = PengajuanCuti::where('user_id', Auth::id())
            ->where('id', '!=', $cuti->id)
            ->whereIn('status', ['approved', 'pending'])
            ->where(function ($query) use ($request) {
                $query->whereBetween('tanggal_mulai', [
                    $request->tanggal_mulai,
                    $request->tanggal_selesai,
                ])
                    ->orWhereBetween('tanggal_selesai', [
                        $request->tanggal_mulai,
                        $request->tanggal_selesai,
                    ])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('tanggal_mulai', '<=', $request->tanggal_mulai)
                            ->where('tanggal_selesai', '>=', $request->tanggal_selesai);
                    });
            })
            ->exists();

        if ($cutiBentrok) {
            return back()->withInput()->with('alert', [
                'type' => 'error',
                'title' => 'Gagal Memperbarui',
                'message' => 'Tanggal yang dipilih bertabrakan dengan pengajuan cuti yang sudah ada.',
            ]);
        }

        if ($request->jenis_cuti === 'cuti_penting') {

            $hariKerja = $this->hitungHariKerja(
                $request->tanggal_mulai,
                $request->tanggal_selesai
            );

            if ($hariKerja > 3) {
                return back()->withInput()->with('alert', [
                    'type' => 'error',
                    'title' => 'Gagal Memperbarui',
                    'message' => 'Cuti penting maksimal 3 hari kerja.',
                ]);
            }
        }

        if ($request->hasFile('bukti')) {
            if ($cuti->bukti) {
                Storage::disk('public')->delete($cuti->bukti);
            }
            $cuti->bukti = $request->file('bukti')->store('bukti-cuti', 'public');
        }

        $cuti->update([
            'jenis_cuti' => $request->jenis_cuti,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'jumlah_hari' => $jumlahHari,
            'alasan' => $request->alasan,
            'bukti' => $cuti->bukti,
        ]);

        return back()->with('alert', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Pengajuan cuti berhasil diperbarui.',
        ]);
    }

    public function destroy($id)
    {
        $cuti = PengajuanCuti::where('user_id', Auth::id())->findOrFail($id);

        if ($cuti->status != 'pending') {
            return back()->with('alert', [
                'type' => 'error',
                'title' => 'Gagal',
                'message' => 'Cuti tidak bisa dihapus.',
            ]);
        }

        if ($cuti->bukti) {
            Storage::disk('public')->delete($cuti->bukti);
        }

        $cuti->delete();

        return redirect()->route('employee.dashboard')->with('alert', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Pengajuan cuti berhasil dihapus.',
        ]);
    }

    private function validasiCuti($request)
    {
        $request->validate([
            'jenis_cuti' => 'required|in:cuti_tahunan,cuti_sakit,cuti_penting',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string|max:500',
            'bukti' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', ]);
    }
}
