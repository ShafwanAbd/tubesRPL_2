@extends('layouts.layout1')

@section('content')
<div class="konfirmasi">
    @if(Auth::user())
        @if(Auth::user()->name == "ADMIN")
        <div class="dropdown">
            <h2 class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Transaksi
            </h2>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('konfirmasi') }}">Komplain</a></li>
            </ul>
        </div>
        @else
        <div class="dropdown">
            <h2 class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Transaksi
            </h2>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('konfirmasi') }}">Konfirmasi</a></li>
            </ul>
        </div>
        @endif
    @else
    <div class="dropdown">
        <h2 class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Transaksi
        </h2>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('konfirmasi') }}">Konfirmasi</a></li>
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
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Nomer HP</th>
            <th scope="col">Status</th>
            <th scope="col">Harga</th>
            <th scope="col">Order ID</th>
            <th scope="col">Payment Type</th>
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
                    <td scope="row">{{ $i }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->nomerHP }}</td>
                    <td>{{ $value->status }}</td>
                    <td>{{ @money($value->gross_amount) }}</td>
                    <td>{{ $value->order_id }}</td>
                    <td>{{ $value->payment_type }}</td>
                    <td>
                        <div class="container-respon">
                            <div class="yes">
                                @if(Auth::user()->name == "ADMIN")
                                    @if($value->status != "success")
                                        <a href="{{ url('status_success/'.$value->id) }}"><button class="btn btn2 hapus">Barang Dikirim</button></a>
                                    @endif
                                @endif
                                <a href="{{ $value->pdf_url }}"><button class="btn btn2 bg-color-secondary">Lihat Invoice</button></a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection