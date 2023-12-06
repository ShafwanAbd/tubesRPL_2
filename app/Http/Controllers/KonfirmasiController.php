<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Models\Konfirmasi;
use App\Models\Order;
use App\Models\Sepatu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonfirmasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->name == "ADMIN"){
            $datas = Komplain::all();

            return view('konfirmasi.konfirmasiMain', compact(
                'datas'
            ));
        } else {
            $datas = Konfirmasi::where('nama', Auth::user()->name)->get();
            
            return view('konfirmasi.konfirmasiMain', compact(
                'datas' 
            ));
        }
    }

    public function status_success($id) {
        
        $model = Order::find($id);
        $model->status = "success";
        $model->save();
        
        return redirect('komplainMain')->with('success', 'Berhasil Mengirim Barang!');
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
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-oV9zLKv72azyUqhH7b97HRk0';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $datas = DB::table('konfirmasi')->where('id', $id)->first();
        $sepatu = DB::table('sepatu')->where('id', $datas->idSepatu)->first();

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $sepatu->harga
            ),

            'item_details' => array(
              [
                "id" => $datas->id,
                "name" => $datas->nama,
                "price" => $datas->harga,
                "quantity" => 1
              ]
            ),

            'customer_details' => array(
                // 'first_name' => $konfirmasi->name,
                'first_name' => Auth::user()->name,
                'last_name' => "",
                'email' => Auth::user()->email,
                'phone' => Auth::user()->nomerHP,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('konfirmasi.konfirmasiBayar', compact(
            'datas', 'sepatu', 'snapToken', 'id'
        ));
    }

    public function show_post(Request $request, $id){

        $json = json_decode($request->get('json'));
        $order = new Order();
        $order->idKonfirmasi = $id;
        $order->status = $json->transaction_status;
        $order->name = Auth::user()->name;
        $order->email = Auth::user()->email;
        $order->nomerHP = Auth::user()->nomerHP;
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;;
        $order->save();

        $konfirmasi = DB::table('konfirmasi')->where('id', $id)->first();
        $konfirmasi = Konfirmasi::find($konfirmasi->id);
    
        $konfirmasi->status++;
        $konfirmasi->save();
        return redirect('/konfirmasi')->with('success', 'Berhasil Membayar Sepatu!');
    }

    public function inc_konfirmasi($id){
        $konfirmasi = DB::table('konfirmasi')->where('id', $id)->first();
        $konfirmasi = Konfirmasi::find($konfirmasi->id);
    
        $konfirmasi->status++;
        $konfirmasi->save();
        return back()->with('success', 'Berhasil Mengupdate Status!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->size == null){
            return back()->with('failed', 'Size Tidak Boleh Kosong!');
        }

        $model = new Konfirmasi;
        $sepatu = Sepatu::find($id);
        $user = Auth::user();

        $model->idSepatu = $id;
        $model->size = $request->size;
        $model->nama = $user->name;
        $model->email = $user->email;
        $model->alamat = $user->alamat;
        $model->harga = DB::table('sepatu')->where('id', $id)->value('harga');
        $model->namaSepatu = DB::table('sepatu')->where('id', $id)->value('nama');
        $model->status = 1; // 1 for exist, 2 for waiting, 3 for done tugas

        $model->save(); 

        return redirect('sepatu/'.$sepatu->id)->with('success', 'Berhasil Memesan Sepatu, Silahkan Bayar di Konfirmasi!');
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
        //
    }
}
