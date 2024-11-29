<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/siswa";
        $response =$client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $data = $contentArray['data'];
        return view('siswa.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama = $request->nama;
        $tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir = $request->tanggal_lahir;
        $alamat = $request->alamat;
        $asal_sekolah = $request->asal_sekolah;
        $no_hp = $request->no_hp;



        $parameterAPI = [
            'nama'=>$nama,
            'tempat_lahir'=>$tempat_lahir,
            'tanggal_lahir'=>$tanggal_lahir,
            'alamat'=>$alamat,
            'asal_sekolah'=>$asal_sekolah,
            'no_hp'=>$no_hp
        ];


        $client = new Client();
        $url = env("BASE_API_ENDPOINT", "somedefaultvalue") . "api/siswa";
        $response =$client->request('POST',$url,[
            'headers' => ['Content-type'=>'application/json'],
            'body'=> json_encode($parameterAPI)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] != true) {
           $error = $contentArray['data'];
           return redirect()->to('siswa')->withErrors($error)->withInput();
        }  else {
            return redirect()->to('siswa')->with('success','Berhasil Menambah Data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/siswa/$id";
        $response =$client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] != true) {
            $error = $contentArray['message'];
            return redirect()->to('siswa')->withErrors($error);
        } else{
            $data = $contentArray['data'];
            return view('siswa.index',['data'=>$data]);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nama = $request->nama;
        $tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir = $request->tanggal_lahir;
        $alamat = $request->alamat;
        $asal_sekolah = $request->asal_sekolah;
        $no_hp = $request->no_hp;



        $parameterAPI = [
            'nama'=>$nama,
            'tempat_lahir'=>$tempat_lahir,
            'tanggal_lahir'=>$tanggal_lahir,
            'alamat'=>$alamat,
            'asal_sekolah'=>$asal_sekolah,
            'no_hp'=>$no_hp
        ];


        $client = new Client();
        $url = env("BASE_API_ENDPOINT", "somedefaultvalue") . "api/siswa/$id";
        $response =$client->request('PUT',$url,[
            'headers' => ['Content-type'=>'application/json'],
            'body'=> json_encode($parameterAPI)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] != true) {
           $error = $contentArray['data'];
           return redirect()->to('siswa')->withErrors($error)->withInput();
        }  else {
            return redirect()->to('siswa')->with('success','Berhasil Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = env("BASE_API_ENDPOINT", "somedefaultvalue") . "api/siswa/$id";
        $response =$client->request('DELETE',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);
        if ($contentArray['status'] != true) {
           $error = $contentArray['data'];
           return redirect()->to('siswa')->withErrors($error)->withInput();
        }  else {
            return redirect()->to('siswa')->with('success','Berhasil Menhapus Data');
        }
    }
}
