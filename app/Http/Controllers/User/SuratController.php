<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:User');
    }

    public function create()
    {
        return view('user.surat');
    }

    public function store(Request $request)
    {
        // Validasi data pengajuan surat
        $request->validate([
            'nama' => 'required',
            'jenis_surat' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required'
        ]);

        // Simpan data pengajuan surat ke dalam database
        $surat = new Surat();
        $surat->nama = $request->nama;
        $surat->jenis_surat = $request->jenis_surat;
        $surat->tanggal_mulai = $request->tanggal_mulai;
        $surat->tanggal_selesai = $request->tanggal_selesai;
        $surat->alasan = $request->alasan;
        $surat->save();

        // Redirect ke halaman sukses atau error
        return redirect()->back()->with('success', 'Pengajuan surat berhasil diajukan.');
    }
}
