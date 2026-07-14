<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Departemen;

class PengumumanController extends Controller
{

public function dashboard()
    {
        $pengajuanCuti = PengajuanCuti::with([
            'user.department',
            'approver',
        ])
            ->latest()
            ->take(5)
            ->get();

        $pengumuman = Pengumuman::with('creator')
            ->latest()
            ->take(3)
            ->get();

        $totalKaryawan = User::count();
        $totalDepartemen = Departemen::count();
        $totalAnggotaTim = User::where('role', 'karyawan')->count();
        $rejected = PengajuanCuti::where('status', 'rejected')->count();
        $pending = PengajuanCuti::where('status', 'pending')->count();
        $approved = PengajuanCuti::where('status', 'approved')->count();

        return view('manager.dashboard', compact(
            'pengajuanCuti',
            'pengumuman',
            'totalAnggotaTim',
            'totalKaryawan',
            'totalDepartemen',
            'rejected',
            'pending',
            'approved'
        ));
    }

    public function employeeIndex()
    {
        $pengumuman = Pengumuman::with('creator')
            ->latest()
            ->get();

        return view('employee.pengumuman', compact('pengumuman'));
    }

    public function DashboardHrd()
    {
        $cuti = PengajuanCuti::with('user')
            ->latest()
            ->take(5)
            ->get();

        $pengumuman = Pengumuman::latest()
            ->take(3)
            ->get();

        $totalAnggotaTim = User::count();
        $pending = PengajuanCuti::where('status', 'pending')->count();
        $approved = PengajuanCuti::where('status', 'approved')->count();
        $rejected = PengajuanCuti::where('status', 'rejected')->count();

        return view('hrd.dashboard', compact(
            'cuti',
            'pengumuman',
            'totalAnggotaTim',
            'pending',
            'approved',
            'rejected'
        ));
    }

    public function index()
    {
        $pengumuman = Pengumuman::with('creator')
            ->latest()
            ->get();

        $statistik = [
            'total' => Pengumuman::count(),
            'bulanIni' => Pengumuman::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
            'hariIni' => Pengumuman::whereDate('created_at', today())
                ->count(),
        ];

        return view('pengumuman.index', compact(
            'pengumuman',
            'statistik'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
        ]);

        Pengumuman::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'created_by' => Auth::id(),
        ]);

        return back()->with('success', 'Pengumuman berhasil dibuat.');
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
        ]);

        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('manager.pengumuman')
            ->with('alert', [
                'type' => 'success',
                'title' => 'Diperbarui!',
                'message' => 'Pengumuman berhasil diperbarui.',
            ]);
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return back()->with('alert', [
            'type' => 'success',
            'title' => 'Dihapus!',
            'message' => 'Pengumuman berhasil dihapus.',
        ]);
    }
}
