@extends('layouts.layout1')

@section('content')
<div class="buatSepatu">
    <div class="title">
        <h1>
            Buat Sepatu
        </h1>
    </div>
    <form method="POST" action="{{ url('sepatu') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex">
            <div class="holder left-side">
                <img src="{{ asset('img/sepatu1.png') }}">
            </div>
            <div class="right-side">
                <div class="left">
                    <h5 class="item">Nama:</h5>
                    <h5 class="item">Merk:</h5>
                    <h5 class="item">Harga:</h5>
                    <h5 class="item">Gambar:</h5>
                </div>
                <div class="right">
                    <input type="text" class="item" name="nama" value="{{ old('nama') }}" autofocus>
                    <input type="text" class="item" name="merk" value="{{ old('merk') }}">
                    <input type="text" class="item" name="harga" value="{{ old('harga') }}">
                    <input type="file" class="item" name="photo">
                    
                    <div class="container-button">
                        <button class="btn1 bg-color-secondary text-white">
                            Buat
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
</div>
@endsection