<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendidikanController extends Controller
{
    public function index()
    {
        $data = Pendidikan::count();
        return view('index', compact('data'));
    }

    public function dataPendidikan()
    {
        $data = Pendidikan::get(); //mengambil database pada tabel pendidikan
        return view('pendidikan.datapendidikan', compact('data')); //menampilkan data yang diambil pada tampilan view datauser
    }

    public function create()
    {
        return view('pendidikan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'tingkatan' => 'required',
                'tahun_masuk' => 'required',
                'tahun_keluar' => 'required'
            ]
        );
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data = [
            'nama' => $request->nama,
            'tingkatan' => $request->tingkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ];

        Pendidikan::create($data);
        return redirect()->route('admin.pendidikan');
    }

    public function update(Request $request, $id)
    {
        $data = Pendidikan::find($id);
        return view('update', compact('data'));
    }

    public function save(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required',
                'tingkatan' => 'required',
                'tahun_masuk' => 'required',
                'tahun_keluar' => 'required'
            ]
        );
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data = [
            'nama' => $request->nama,
            'tingkatan' => $request->jabatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ];

        Pendidikan::whereId($id)->update($data);
        return redirect()->route('admin.pendidikan');
    }

    public function delete($id)
    {
        $data = Pendidikan::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('admin.pendidikan');
    }
}
