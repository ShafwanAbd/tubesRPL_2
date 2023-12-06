@extends('layouts.layout1')

@section('content')
<div class="konfirmasi">
    @if(Auth::user())
        @if(Auth::user()->name == "ADMIN")
        <div class="dropdown">
            <h2 class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Komplain
            </h2>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('komplainMain') }}">Transaksi</a></li>
            </ul>
        </div>
        @else
            <div class="dropdown">
                <h2 class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Konfirmasi
                </h2>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('komplainMain') }}">Transaksi</a></li>
                </ul>
            </div>
        @endif
    @else
        <div class="dropdown">
            <h2 class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Konfirmasi
            </h2>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('komplainMain') }}">Transaksi</a></li>
            </ul>
        </div>
    @endif
    <br>
    @if(Session::has('success'))
        <p class="alert alert-success" id="sixSeconds">{{ Session::get('success') }}</p>
    @endif
    <table class="table table-hover border">
        <thead>
            <tr>
            <th scope="col">No</th>
            @if(Auth::user())
                @if(Auth::user()->name == "ADMIN")
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                @endif
            @endif
            <th scope="col">Alamat</th>
            <th scope="col">Nama Sepatu</th>
            <th scope="col">Size</th>
            <th scope="col">Harga</th>
            @if(Auth::user()->name == "ADMIN")
                <th scope="col">Komplain</th>
            @else
                <th scope="col">Respon</th>
            @endif
            </tr>
        </thead>
        <tbody>
            <div class="hidden">
                {{ $i = 0}}
            </div>
            @foreach($datas as $key=>$value)
                <div class="hidden">
                    {{ $i++ }}
                </div>
                <tr>
                    <th scope="row">{{ $i }}</th>
                    @if(Auth::user())
                        @if(Auth::user()->name == "ADMIN")
                            <td>{{ $value->nama }}</td>
                            <td>{{ $value->email }}</td>
                        @endif
                    @endif
                    <td>{{ $value->alamat }}</td>
                    <td>{{ $value->namaSepatu }}</td>
                    <td>{{ $value->size }}</td>
                    <td>{{ @money($value->harga) }}</td>
                    @if(Auth::User()->name == "ADMIN")
                    <td>
                        <div class="container-respon">
                            <div class="yes">
                                @if(Auth::User()->name == "ADMIN")
                                    <a href="{{ url('komplain/'.$value->id) }}"><button class="btn btn2 hapus">Lihat Komplain</button></a>
                                @else
                                    <a href="#"><button class="btn">Komplain</button></a>
                                @endif
                            </div>
                        </div>
                    </td>
                    @else
                    <td class="container-outside-respon">
                        <div class="container-respon">
                            <div class="yes">
                                @if ($value->status == 1)
                                    <a href="{{ url('konfirmasi/'.$value->id) }}"><button class="btn btn2 hapus">Bayar</button></a>
                                @elseif ($value->status == 2)
                                    @if(App\Models\Order::where('idKonfirmasi', $value->id)->value('status') == "success")
                                        <a href="{{ url('inc_konfirmasi/'.$value->id) }}"><button class="btn btn2 hapus">Barang diterima</button></a>
                                    @else
                                        <a><button class="btn btn2 hapus disabled">Menunggu Barang Dikirim</button></a>
                                    @endif
                                    @elseif ($value->status == 3)
                                    <a href="{{ url('komplain/'.$value->id.'/edit') }}"><button class="btn btn2 hapus">Komplain</button></a>
                                    <a href="{{ url('komplain_delete/'.$value->id) }}"><button class="btn btn2 bayar">Hapus</button></a>
                                @elseif ($value->status == 4)
                                    <a><button class="btn btn2 disabled">Komplain</button></a>
                                @endif
                            </div>
                        </div>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection