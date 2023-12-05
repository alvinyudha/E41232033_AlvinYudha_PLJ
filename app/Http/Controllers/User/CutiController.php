<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:User');
    }

    public function create()
    {
        return view('user.cuti');
    }

    public function store(Request $request)
    {
        // Validasi data pengajuan cuti
        $request->validate([
            'nama' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required'
        ]);

        // Simpan data pengajuan cuti ke dalam database
        $cuti = new Cuti();
        $cuti->nama = $request->nama;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->alasan = $request->alasan;
        $cuti->save();

        // Redirect ke halaman sukses atau error
        return redirect()->back()->with('success', 'Pengajuan cuti berhasil diajukan.');
    }
}
