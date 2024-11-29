<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::orderBy('id', 'asc')->get();
        return response()->json([
            'status'=>true,
            'message'=>'Data ditemukan Siswa Ditemukan',
            'data'=>$data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dataSiswa = new Siswa;

        $rules =[
            'nama'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required|date',
            'alamat'=>'required',
            'asal_sekolah'=>'required',
            'no_hp'=>'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal Menambahkan Data',
                'data'=>$validator->errors()
            ]);
        }

        $dataSiswa->nama = $request->nama;
        $dataSiswa->tempat_lahir = $request->tempat_lahir;
        $dataSiswa->tanggal_lahir = $request->tanggal_lahir;
        $dataSiswa->alamat = $request->alamat;
        $dataSiswa->asal_sekolah = $request->asal_sekolah;
        $dataSiswa->no_hp = $request->no_hp;

        $post = $dataSiswa->save();

        return response()->json([
            'status'=> true,
            'message'=>'Berhasil Menambahkan Data'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Siswa::find($id);
        if ($data) {
            return response()->json([
                'status'=> true,
                'message'=>'Data ditemukan',
                'data'=>$data
            ],200);
        } else {
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $dataSiswa = Siswa::find($id);
        if (empty($dataSiswa)) {
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ],404);
        }

        $rules =[
            'nama'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required|date',
            'alamat'=>'required',
            'asal_sekolah'=>'required',
            'no_hp'=>'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal Update Data',
                'data'=>$validator->errors()
            ]);
        }

        $dataSiswa->nama = $request->nama;
        $dataSiswa->tempat_lahir = $request->tempat_lahir;
        $dataSiswa->tanggal_lahir = $request->tanggal_lahir;
        $dataSiswa->alamat = $request->alamat;
        $dataSiswa->asal_sekolah = $request->asal_sekolah;
        $dataSiswa->no_hp = $request->no_hp;

        $post = $dataSiswa->save();

        return response()->json([
            'status'=> true,
            'message'=>'Berhasil Update Data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataSiswa = Siswa::find($id);
        if (empty($dataSiswa)) {
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ],404);
        }

        $post = $dataSiswa->delete();

        return response()->json([
            'status'=> true,
            'message'=>'Berhasil Menghapus Data'
        ]); 
    }
}
