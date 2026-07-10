<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\PengajuanCuti;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerCutiController extends Controller
{
    public function dashboard()
    {
        $totalKaryawan = User::where('role', 'karyawan')->count();

        $totalDepartemen = Departemen::count();

        $pending = PengajuanCuti::where('status', 'pending')->count();

        $approved = PengajuanCuti::where('status', 'approved')->count();

        $pengajuanCuti = PengajuanCuti::with(['user.department'])
            ->latest()
            ->take(3)
            ->get();

        $pengumuman = Pengumuman::with('creator')
            ->latest()
            ->take(3)
            ->get();

        return view('manager.dashboard', compact(
            'totalKaryawan',
            'totalDepartemen',
            'pending',
            'approved',
            'pengajuanCuti',
            'pengumuman'
        ));
    }

    public function daftarCuti(Request $request)
    {
        $query = PengajuanCuti::with(['user.department']);
        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_mulai', $request->tanggal);
        }

        $pengajuanCuti = $query->latest()->get();
        $totalPengajuan = (clone $query)->count();

        $pending = (clone $query)->where('status', 'pending')->count();
        $approved = (clone $query)->where('status', 'approved')->count();
        $rejected = (clone $query)->where('status', 'rejected')->count();

        return view('manager.daftar_cuti', [
            'pengajuanCuti' => $pengajuanCuti,
            'totalPengajuan' => $totalPengajuan,
            'pending' => $pending,
            'approved' => $approved,
            'rejected' => $rejected,
        ]);
    }
}
