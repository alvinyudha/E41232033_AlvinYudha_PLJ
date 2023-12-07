<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\KonfirmasiCuti;
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:Admin');
    }
    public function index()
    {
        $cutis = Cuti::all();

        return view('admin.detailCuti', compact('cutis'));
    }
    public function show($id)
    {
        $cuti = Cuti::findOrFail($id);

        return view('admin.showCuti', compact('cuti'));
    }

    public function approve($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->update(['status' => 'disetujui']);

        return redirect()->route('cuti.detail')->with('success', 'Cuti berhasil disetujui!');
    }

    public function reject($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->update(['status' => 'ditolak']);

        return redirect()->route('cuti.detail')->with('success', 'Cuti berhasil ditolak!');
    }
}
