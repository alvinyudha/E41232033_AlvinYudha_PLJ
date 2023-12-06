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

    public function show($id)
    {
        $cuti = Cuti::findOrFail($id);

        return view('admin.konfirmasi', compact('cuti'));
    }

    public function konfirmasiCuti($id)
    {
        $cuti = Cuti::findOrFail($id);


        // Membuat konfirmasi cuti baru
        $konfirmasiCuti = new KonfirmasiCuti();
        $konfirmasiCuti->cuti_id = $cuti->id;
        $konfirmasiCuti->disetujui = true;
        $konfirmasiCuti->save();

        // Redirect ke halaman sukses
        return redirect()->back()->with('success', 'Cuti berhasil dikonfirmasi.');
    }
}
