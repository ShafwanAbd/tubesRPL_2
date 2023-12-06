<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SepatuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywordNama = "";
        $keywordMerk = "";
        $keywordWarna = "";
        $keywordUkuran = "";

        $datas = Sepatu::all();
        
        if ($request->keywordNama){
            $keywordNama = $request->keywordNama;
            $datas = Sepatu::where('nama', 'LIKE', '%'.$keywordNama.'%')
                ->paginate(20);
        } else if ($request->keywordMerk){
            $keywordMerk = $request->keywordMerk;
            $datas = Sepatu::where('merk', 'LIKE', '%'.$keywordMerk.'%')
                ->paginate(20);
        } else if ($request->keywordWarna){
            $keywordWarna = $request->keywordWarna;
            $datas = Sepatu::where('nama', 'LIKE', '%'.$keywordWarna.'%')
                ->paginate(20);
        }

        return view('shop.shopMain', compact(
            'datas', 'keywordNama', 'keywordMerk', 'keywordWarna', 'keywordUkuran'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.buatSepatu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Sepatu();

        $model->nama = $request->nama;
        $model->merk = $request->merk;
        $model->harga = $request->harga;
        $model->save();

        if ($request->file('photo')){
            $file = $request->file('photo');
            // $namaFile = time().str_replace(" ", "", $model->name);
            $namaFile = "imgSepatu_".$model->id.".png";
            $file->move('imgSepatu', $namaFile);
            $model->photo = $namaFile;
        }
        $model->save();

        return redirect('sepatu')->with('success', 'Berhasil Menambahkan Sepatu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Sepatu::find($id);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-oV9zLKv72azyUqhH7b97HRk0';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('shop.shopItem', compact(
            'datas', 'snapToken'
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Sepatu::find($id);
        $model->delete();
        
        return redirect('sepatu')->with('success', 'Berhasil Menghapus Sepatu!');
    }

    public function delete($id)
    {
        $model = Sepatu::find($id);
        $model->delete();
        
        return redirect('sepatu')->with('success', 'Berhasil Menghapus Sepatu!');
    }
}
