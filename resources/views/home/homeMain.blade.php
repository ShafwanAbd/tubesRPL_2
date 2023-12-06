@extends('layouts.layout1')

@section('content')
<div class="home">
    <div class="home-img">
        <div class="holder one">
            <h1>brys.co</h1>
        </div>

        <div class="holder two">
            <h1>When Shoes Speak Louder Than Words.</h1>
        </div>
    </div>

    <div class="overview-1">
        <div class="holder one">

        </div>
        <div class="holder two">
            <div class="two-one">
                <h4>Trending Shoe</h4>
                <h2>{{ $overviewShoe->nama }}</h2>
            </div>
            <div class="two-two">
                <a href="{{ url('sepatu/'.$overviewShoe->id) }}" class="btn1">SHOP NOW</a>
            </div>
        </div>
    </div>
    <img id="img-hot" src="{{ asset('img/hot.png') }}">
    <div class="overview-2">
        <div class="oneandtwo">
            <div class="holder one">
                @if (strlen($hotShoe->photo) > 0)
                    <img src="{{ asset('imgSepatu/'.$hotShoe->photo) }}">
                @else
                    <img src="{{ asset('img/sepatu1.png') }}">
                @endif
            </div>
            <div class="holder two">
                <h1>{{ $hotShoe->nama }}</h1>
                <h4>{{ $hotShoe->nama }} Adalah Sepatu yang Sedang Banyak Dicari Oleh Banyak Orang! Segera Beli Sebelum Kehabisan!</h4>
                <a href="{{ url('sepatu/'.$hotShoe->id) }}">BELI SEKARANG</a>
            </div>
        </div>
    </div>
    
    <div class="overview-3">
        <div class="holder one">
            <h1>Sepatu Terbaik</h1>
        </div>
        <div class="holder two">
            @foreach($shoe as $key => $value)
                <a class="two-one first" href="{{ url('sepatu/'.$value->id) }}">
                    <div class="two-one-one">
                        @if (strlen($value->photo) > 0)
                            <img src="{{ asset('imgSepatu/'.$value->photo) }}">
                        @else
                            <img src="{{ asset('img/sepatu1.png') }}">
                        @endif
                    </div>
                    <div class="two-one-two"> 
                        <h3>{{ $value->nama }}</h3>
                        <h5>{{ $value->merk }}</h5>
                        <h6>{{ @money($value->harga) }}</h6>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="overview-4">
        <div class="holder one">
            <h1>Anonymous</h1>
            <h5>“Winners are not people who do not fail, but people who never quit“</h5>
        </div>
    </div>

    <div class="overview-5">
        <div class="holder one">
            <h6>Payment Integrated with Midtrans</h6>
        </div>
        <div class="holder two">
            <div class="left-side">
                <h4>Sosial Media Brys.co</h4>
                <div class="container-1">
                    <a href="https://wa.me/6282120019232">
                        <div class="item isi-1">
                            <img src="{{ asset('img/whatsapp.png') }}">
                        </div>
                    </a>
                    <a href="https://instagram.com/brys.co">
                        <div class="item isi-2">
                            <img src="{{ asset('img/instagram.png') }}">
                        </div>
                    </a>
                    <a href="https://facebook.com/brys.co">
                        <div class="item isi-3">
                            <img src="{{ asset('img/facebook.png') }}">
                        </div>
                    </a>
                </div>
            </div>
            <div class="middle-side">
                <h4>Menu</h5>
                <div class="menu">
                    <a href="{{ url('sepatu') }}">
                        <div class="item">
                            <h2>Belanja</h2>
                        </div>
                    </a>
                    <a href="{{ url('about') }}">
                        <div class="item">
                            <h2>Info</h2>
                        </div>
                    </a>
                    <a href="{{ url('home') }}">
                        <div class="item">
                            <h2>Beranda</h2>
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

</div>
@endsection