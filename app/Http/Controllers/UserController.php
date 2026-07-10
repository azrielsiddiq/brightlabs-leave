<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('department')->latest()->get();

        $departments = Departemen::orderBy('nama_departemen')->get();

        $statistik = [
            'total' => User::count(),
            'karyawan' => User::where('role', 'karyawan')->count(),
            'manager' => User::where('role', 'manager')->count(),
            'hrd' => User::where('role', 'hrd')->count(),
        ];

        return view('akun.index', compact(
            'users',
            'departments',
            'statistik'
        ));
    }

    public function store(Request $request)
    {
        $allowedRoles = auth()->user()->role === 'manager'
            ? ['karyawan', 'manager', 'hrd']
            : ['karyawan'];

        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'role' => ['required', Rule::in($allowedRoles)],
            'department_id' => 'required|exists:departments,id',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'department_id' => $request->department_id,
            'password' => Hash::make($request->password),
        ]);

        $route = auth()->user()->role === 'manager'
            ? 'manager.user'
            : 'hrd.user';

        return redirect()
            ->route($route)
            ->with('alert', [
                'type' => 'success',
                'title' => 'Berhasil!',
                'message' => 'Akun berhasil dibuat.',
            ]);
    }

    public function edit(User $user)
    {
        if (
            auth()->user()->role === 'hrd' &&
            $user->role !== 'karyawan' &&
            $user->id !== auth()->id()
        ) {
            return redirect()
                ->route('hrd.user')
                ->with('alert', [
                    'type' => 'warning',
                    'title' => 'Akses Ditolak!',
                    'message' => 'HRD hanya dapat mengedit akun Karyawan atau akun miliknya sendiri.',
                ]);
        }

        $departments = Departemen::orderBy('nama_departemen')->get();

        return view('akun.edit', compact(
            'user',
            'departments'
        ));
    }

    public function update(Request $request, User $user)
    {
        if (
            auth()->user()->role === 'hrd' &&
            $user->role !== 'karyawan' &&
            $user->id !== auth()->id()
        ) {
            return redirect()
                ->route('hrd.user')
                ->with('alert', [
                    'type' => 'warning',
                    'title' => 'Akses Ditolak!',
                    'message' => 'HRD hanya dapat mengubah akun Karyawan atau akun miliknya sendiri.',
                ]);
        }

        if (auth()->user()->role === 'hrd') {
            $request->merge([
                'role' => $user->id == auth()->id() ? 'hrd' : 'karyawan',
            ]);
        }

        $request->validate([
            'name' => 'required|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'role' => 'required|in:karyawan,manager,hrd',
            'department_id' => 'required|exists:departments,id',
            'password' => 'nullable|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->department_id = $request->department_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route(auth()->user()->role.'.user')
            ->with('alert', [
                'type' => 'success',
                'title' => 'Diperbarui!',
                'message' => 'Data akun berhasil diperbarui.',
            ]);
    }

    public function destroy(User $user)
    {
        $loginUser = auth()->user();

        if ($loginUser->role === 'hrd' && $user->id == $loginUser->id) {
            return back()->with('alert', [
                'type' => 'warning',
                'title' => 'Aksi Ditolak!',
                'message' => 'HRD tidak dapat menghapus akun miliknya sendiri.',
            ]);
        }

        if ($loginUser->role === 'manager' && $user->id == $loginUser->id) {
            return back()->with('alert', [
                'type' => 'warning',
                'title' => 'Aksi Ditolak!',
                'message' => 'Anda tidak dapat menghapus akun milik sendiri.',
            ]);
        }

        if ($loginUser->role === 'hrd' && $user->role !== 'karyawan') {
            return back()->with('alert', [
                'type' => 'warning',
                'title' => 'Akses Ditolak!',
                'message' => 'HRD hanya dapat menghapus akun dengan role Karyawan.',
            ]);
        }

        $user->delete();

        return redirect()
            ->route($loginUser->role.'.user')
            ->with('alert', [
                'type' => 'success',
                'title' => 'Berhasil!',
                'message' => 'Akun berhasil dihapus.',
            ]);
    }
}
