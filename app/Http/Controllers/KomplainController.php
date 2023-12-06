<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komplain;
use App\Models\Konfirmasi;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Komplain::find($id);
        $konfirmasi = DB::table('konfirmasi')->where('id', $id)->first();
        $sepatu = DB::table('sepatu')->where('id', $konfirmasi->idSepatu)->first();

        return view('komplain.lihatKomplain', compact(
            'datas', 'sepatu', 'id'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $id;
        $konfirmasi = Konfirmasi::find($id);
        $sepatu = DB::table('sepatu')->where('id', $konfirmasi->idSepatu)->first();
        
        $konfirmasi->status++;
        $konfirmasi->save();

        return view('komplain.buatKomplain', compact(
            'id', 'sepatu'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = new Komplain();

        $konfirmasi = DB::table('konfirmasi')->where('id', $id)->first();
        $sepatu = DB::table('sepatu')->where('id', $konfirmasi->idSepatu)->first();

        if (DB::table('komplain')->where('idKonfirmasi', $id)->value('id') == $id){
            DB::table('komplain')->where('idKonfirmasi', $id)->update([
                'id' => $id,
                'idSepatu' => $sepatu->id,
                'idKonfirmasi' => $id,
                'nama' => $konfirmasi->nama,
                'email' => $konfirmasi->email,
                'pesan' => $request->pesan,
                'alamat' => $konfirmasi->alamat,
                'harga' => DB::table('sepatu')->where('id', $sepatu->id)->value('harga'),
                'namaSepatu' => DB::table('sepatu')->where('id', $sepatu->id)->value('nama'),
                'status' => 1
            ]);
        } else {
            $model->id = $id;
            $model->idSepatu = $sepatu->id;
            $model->idKonfirmasi = $id;
            $model->size = $konfirmasi->size;
            $model->nama = $konfirmasi->nama;
            $model->email = $konfirmasi->email;
            $model->pesan = $request->pesan;
            $model->alamat = $konfirmasi->alamat;
            $model->harga = DB::table('sepatu')->where('id', $sepatu->id)->value('harga');
            $model->namaSepatu = DB::table('sepatu')->where('id', $sepatu->id)->value('nama');
            $model->status = 1; // 1 for exist, 2 for payed, 3 for done payed
    
            $model->save();
    
            if ($request->file('photo')){
                $file = $request->file('photo');
                // $namaFile = time().str_replace(" ", "", $model->name);
                $namaFile = "imgKomplain_".$_FILES["photo"]["name"];
                $file->move('imgKomplain', $namaFile);
                $model->photo = $namaFile;
            }
    
            $model->save();
        }

        return redirect('konfirmasi')->with('success', 'Berhasil Mengirimkan Komplain!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konfirmasi = Konfirmasi::find($id);
        $komplain = Komplain::find($id);

        $konfirmasi->status = 2;
            
        $konfirmasi->save();
        $komplain->delete();

        return redirect('konfirmasi')->with('success', 'Berhasil Menukarkan Barang');
    }

    public function delete($id)
    {
        $konfirmasi = Konfirmasi::find($id);

        $konfirmasi->delete();

        return redirect('konfirmasi')->with('success', 'Berhasil Menghapus Barang');
    }

    public function komplainMain()
    {     
        if (Auth::user()){
            if (Auth::user()->name == "ADMIN"){
                $datas = Order::all();
            } else {
                $datas = Order::where('name', Auth::user()->name)->get();
            }
        } else {
            $datas = [];
        }

        return view('konfirmasi.complainMain', compact(
            'datas'
        ));
    }
}