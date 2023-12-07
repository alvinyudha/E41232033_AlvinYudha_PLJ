<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:User');
    }
    public function index()
    {
        $cutis = Cuti::all();

        return view('user.riwayatCuti', compact('cutis'));
    }
    public function cutiRiwayat($id)
    {
        $cuti = Cuti::findOrFail($id);

        return view('user.detailRiwayat', compact('cuti'));
    }
}
