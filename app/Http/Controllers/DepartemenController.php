<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemen = Departemen::latest()->get();

        $statistik = [
            'total' => Departemen::count(),
            'karyawan' => 0,
            'bulanIni' => Departemen::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
        ];

        return view('hrd.departemen.departemen', compact(
            'departemen',
            'statistik'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_departemen' => 'required|max:20|unique:departments,kode_departemen',
            'nama_departemen' => 'required|max:100',
            'deskripsi_tugas' => 'required',
        ]);

        Departemen::create([
            'kode_departemen' => strtoupper($request->kode_departemen),
            'nama_departemen' => $request->nama_departemen,
            'deskripsi_tugas' => $request->deskripsi_tugas,
        ]);

        return redirect()
            ->route('hrd.departemen')
            ->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function edit(Departemen $departemen)
    {
        return view('hrd.departemen.edit_departemen', compact('departemen'));
    }

    public function update(Request $request, Departemen $departemen)
    {
        $request->validate([
            'kode_departemen' => 'required|max:20|unique:departments,kode_departemen,'.$departemen->id,
            'nama_departemen' => 'required|max:100',
            'deskripsi_tugas' => 'required',
        ]);

        $departemen->update([
            'kode_departemen' => strtoupper($request->kode_departemen),
            'nama_departemen' => $request->nama_departemen,
            'deskripsi_tugas' => $request->deskripsi_tugas,
        ]);

        return redirect()
            ->route('hrd.departemen')
            ->with('success', 'Departemen berhasil diperbarui.');
    }

    public function destroy(Departemen $departemen)
    {
        $departemen->delete();

        return redirect()
            ->route('hrd.departemen')
            ->with('success', 'Departemen berhasil dihapus.');
    }
}
