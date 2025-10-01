<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;

class AdminController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('user')->latest()->get();
        return view('admin.dashboard', compact('peminjamans'));
    }

    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update(['status' => 'disetujui']);
        return redirect()->route('admin.dashboard')->with('success', 'Peminjaman disetujui!');
    }

    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update(['status' => 'ditolak']);
        return redirect()->route('admin.dashboard')->with('success', 'Peminjaman ditolak!');
    }
}
