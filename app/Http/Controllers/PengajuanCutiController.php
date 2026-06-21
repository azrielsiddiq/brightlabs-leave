<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanCutiController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $cutiSaya = PengajuanCuti::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $totalCutiTahunan = 12;

        $cutiDipakai = PengajuanCuti::where('user_id', $user->id)
            ->where('jenis_cuti', 'cuti_tahunan')
            ->where('status', 'approved')
            ->whereYear('tanggal_mulai', now()->year)
            ->sum('jumlah_hari');

        $sisaCuti = max(0, $totalCutiTahunan - $cutiDipakai);

        $pending = PengajuanCuti::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();

        $approved = PengajuanCuti::where('user_id', $user->id)
            ->where('status', 'approved')
            ->count();

        return view('employee.dashboard', compact(
            'cutiSaya',
            'totalCutiTahunan',
            'sisaCuti',
            'pending',
            'approved'
        ));
    }

    public function create()
    {
        return view('employee.pengajuan_cuti_create');
    }

    public function riwayat()
    {
        $cutiSaya = PengajuanCuti::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('employee.riwayat_cuti', compact('cutiSaya'));
    }

    public function store(Request $request)
    {
        $this->validasiCuti($request);

        $user = Auth::user();

        $jumlahHari = Carbon::parse($request->tanggal_mulai)
            ->diffInDays(Carbon::parse($request->tanggal_selesai)) + 1;

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
        $cuti = PengajuanCuti::where('user_id', Auth::id())
            ->findOrFail($id);

        if ($cuti->status != 'pending') {
            return redirect()->route('riwayat.cuti')->with('alert', [
                'type' => 'error',
                'title' => 'Tidak Bisa Edit',
                'message' => 'Cuti yang sudah diproses tidak bisa diubah.',
            ]);
        }

        return view('employee.pengajuan_cuti_edit', compact('cuti'));
    }

    public function update(Request $request, $id)
    {
        $cuti = PengajuanCuti::where('user_id', Auth::id())
            ->findOrFail($id);

        if ($cuti->status != 'pending') {
            return back()->with('alert', [
                'type' => 'error',
                'title' => 'Gagal',
                'message' => 'Cuti tidak bisa diubah.',
            ]);
        }

        $this->validasiCuti($request);

        $jumlahHari = Carbon::parse($request->tanggal_mulai)
            ->diffInDays(Carbon::parse($request->tanggal_selesai)) + 1;

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
        $cuti = PengajuanCuti::where('user_id', Auth::id())
            ->findOrFail($id);

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
            'bukti' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
    }
}
