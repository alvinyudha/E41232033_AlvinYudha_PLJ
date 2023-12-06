<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Riwayat;
use App\Models\Surat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:User');
    }

    public function index()
    {
        $riwayatsSurat = Surat::all(); // Ambil semua data riwayat surat dari database
        $riwayatsCuti = Cuti::all(); // Ambil semua data riwayat cuti dari database

        return view('user.riwayat', ['riwayatsSurat' => $riwayatsSurat, 'riwayatsCuti' => $riwayatsCuti]);
    }
}
