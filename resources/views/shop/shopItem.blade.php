@extends('layouts.layout1')

@section('content')
<div class="container-item">
    <div class="holder left-side">
        @if (strlen($datas->photo) > 0)
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('imgSepatu/'.$datas->photo) }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/ukuran.png') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/sepatu1.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/ukuran.png') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif
    </div>
    <div class="holder right-side">
    @if(Session::has('success'))
        <p class="alert alert-success" id="sixSeconds">{{ Session::get('success') }}</p>
    @endif
    @if(Session::has('failed'))
        <p class="alert alert-danger" id="sixSeconds">{{ Session::get('failed') }}</p>
    @endif
        <div class="item-judul">
            <h1 class="nama">{{ $datas->nama }}</h1>
            <h2 class="merk">{{ $datas->merk }}</h2>
            <h4 class="harga">{{ @money($datas->harga) }}</h4>
            <h5>Size</h5>
        </div>
        <div class="container-size">
            <form method="GET" action="{{ url('konfirmasi/'.$datas->id.'/edit') }}">
                @csrf
            <input id="radio1" type="radio" name="size" value="37"/>
            <label class="item-size" for="radio1">37</label>

            <input id="radio2" type="radio" name="size" value="38"/>
            <label class="item-size" for="radio2">38</label>
            
            <input id="radio3" type="radio" name="size" value="39"/>
            <label class="item-size" for="radio3">39</label>

            <input id="radio4" type="radio" name="size" value="40"/>
            <label class="item-size" for="radio4">40</label>
            
            <input id="radio5" type="radio" name="size" value="41"/>
            <label class="item-size" for="radio5">41</label>
            
            <input id="radio6" type="radio" name="size" value="42"/>
            <label class="item-size" for="radio6">42</label>
            
            <input id="radio7" type="radio" name="size" value="43"/>
            <label class="item-size" for="radio7">43</label>
            
            <input id="radio8" type="radio" name="size" value="44"/>
            <label class="item-size" for="radio8">44</label>
            
            <input id="radio9" type="radio" name="size" value="45"/>
            <label class="item-size" for="radio9">45</label>
        </div>
        <div class="container-desc1">
            <h7>*Kami menganjurkan untuk menggunakan CM (Centimeter) dalam pertimbangan memilih size pada sneakers yang ingin di order.</h7>
        </div>
        <div class="container-button">
            @if (Auth::user())
                @if (Auth::user()->name == "ADMIN")
                    <form class="item" method="POST" action="{{ url('sepatu/'.$datas->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                    
                        <button class="btn1 hapus" type="submit">
                            Hapus
                        </button>
                    </form> 

                    <button class="btn1 item">
                        Pesan
                    </button>
                @else
                        <button class="btn1 alone" type="submit">Pesan</button>
                @endif
            @else
                <button type="button" class="btn1 alone" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Pesan
                </button><!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Yahh...</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Untuk Membeli Barang Anda Harus Login Terlebih Dahulu!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-color-primary text-white" data-bs-dismiss="modal">Close</button>
                            <a href="{{ url('login') }}"><button type="button" class="btn bg-color-secondary text-white">Login</button></a>
                        </div>
                        </div>
                    </div>
                </div>
            @endif
            </form>
        </div>
        <div class="overview-1">
            <div class="judul">
                <h4>Cara Pembayaran</h4>
            </div>
            <div class="deskripsi">
                <p>Cukup dengan memilih sepatu dengan spesifikasi yang sesuai lalu klik tombol "Beli" dan bayar sesuai harga yang tertera dengan banyak pilihan opsi lalu barang akan langsung dikirimkan ke alamat Anda.</p>
            </div>
        </div>

        <div class="overview-2">
            <div class="judul">
                <h4>Kebijakan Retur Produk</h4>
            </div>
            <ul>
                <li>HANYA BERLAKU JIKA produk cacat produksi (rusak, berlubang, atau robek) atau kami salah kirim size.</li>
                <li>Harap disertakan bukti video unboxing dari pembeli.</li>
                <li>Retur TIDAK BERLAKU untuk kesalahan pembeli salah pilih size, model, dan warna.</li>
            </ul>
        </div>
    </div>
</div>
@endsection