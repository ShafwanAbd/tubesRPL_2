@extends('layouts.layout1')

@section('content')
<div class="about home">
   <div class="overview-1">
        <h1>ABOUT BRYS.CO</h1>
   </div>
   <div class="overview-2">
        <h2>More About Brys.co</h2>
        <p>Kami Menjual Semua Sepatu Lokal yang Ada di Indonesia dengan Harga yang Terjangkau dan dengan Pengiriman Meliputi
            Seluruh Pulau Indonesia dengan Biaya Ongkos Kirim yang Murah, Proses Pembayaran pada Website brys.co ini juga Menggunakan
            Payment Gateway Berupa Midtrans Sehingga Banyak Opsi Untuk Melakukan Pembayaran.</p>
   </div>

   <div class="overview-5">
        <div class="holder one">
            <h6>Payment Integrated with Midtrans</h6>
        </div>
        <div class="holder two">
            <div class="left-side">
                <h4>Sosial Media Brys.co</h4>
                <div class="container-1">
                    <a href="#">
                        <div class="item isi-1">
                            <img src="{{ asset('img/whatsapp.png') }}">
                        </div>
                    </a>
                    <a href="#">
                        <div class="item isi-2">
                            <img src="{{ asset('img/instagram.png') }}">
                        </div>
                    </a>
                    <a href="#">
                        <div class="item isi-3">
                            <img src="{{ asset('img/facebook.png') }}">
                        </div>
                    </a>
                </div>
            </div>
            <div class="middle-side">
                <h4>Menu</h5>
                <div class="menu">
                    <a href="#">
                        <div class="item">
                            <h2>Belanja</h2>
                        </div>
                    </a>
                    <a href="#">
                        <div class="item">
                            <h2>Info</h2>
                        </div>
                    </a>
                    <a href="#">
                        <div class="item">
                            <h2>Beranda</h2>
                        </div>
                    </a>
                    <a href="#">
                        <div class="item">
                            <h2>Login</h2>
                        </div>
                    </a>
                    <a href="#">
                        <div class="item">
                            <h2>Register</h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="right-side middle-side">
                <h4>Menu</h5>
                <div class="menu">
                    <a href="{{ url('home/faq') }}">
                        <div class="item">
                            <h2>FAQ</h2>
                        </div>
                    </a>
                    <a href="#">
                        <div class="item">
                            <h2>Terms & Conditions</h2>
                        </div>
                    </a>
                    <a href="#">
                        <div class="item">
                            <h2>Contact Us</h2>
                        </div>
                    </a>
                    <a href="{{ url('home/privacy') }}">
                        <div class="item">
                            <h2>Privacy Policy</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="holder three">
            <h5>@2022 Produced by Brys.co</h5>
        </div>
    </div>

    <!-- <div class="overview-3">
        <h2 class="judul">We Are</h2>
        <div class="holder item-people">
            <div class="left-side">
                <img src="{{ asset('./img/profile.png') }}">
            </div>
            <div class="right-side">
                <div class="info" >
                    <h2>Nama: Muhammad Shafwan Abdullah</h2>
                    <h3>NPM: 217006104</h3>
                    <h3>Kelas: D</h3>
                </div>
            </div>
        </div>
        <div class="holder item-people">
            <div class="left-side">
                <img src="{{ asset('./img/profile.png') }}">
            </div>
            <div class="right-side">
                <div class="info" >
                    <h2>Nama: Muhammad Shafwan Abdullah</h2>
                    <h3>NPM: 217006104</h3>
                    <h3>Kelas: D</h3>
                </div>
            </div>
        </div>
   </div> -->
</div>
@endsection