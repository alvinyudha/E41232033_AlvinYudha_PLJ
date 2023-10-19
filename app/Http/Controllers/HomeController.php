<?php

namespace App\Http\Controllers;

use App\Models\PengalamanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function dashboard()
    // {
    //     return view('dashboard');
    // }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = PengalamanKerja::count();
        return view('index', compact('data'));
    }

    public function datauser()
    {
        $data = PengalamanKerja::get(); //mengambil database pada tabel Pengalaman_Kerja
        return view('datauser', compact('data')); //menampilkan data yang diambil pada tampilan view datauser
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'jabatan' => 'required',
                'tahun_masuk' => 'required',
                'tahun_keluar' => 'required'
            ]
        );
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ];

        PengalamanKerja::create($data);
        return redirect()->route('admin.data');
    }

    public function update(Request $request, $id)
    {
        $data = PengalamanKerja::find($id);
        return view('update', compact('data'));
    }

    public function save(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'jabatan' => 'required',
                'tahun_masuk' => 'required',
                'tahun_keluar' => 'required'
            ]
        );
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ];

        PengalamanKerja::whereId($id)->update($data);
        return redirect()->route('admin.data');
    }

    public function delete(Request $request, $id)
    {
        $data = PengalamanKerja::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('admin.data');
    }
}
