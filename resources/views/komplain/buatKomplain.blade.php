@extends('layouts.layout1')

@section('content')
<div class="buatSepatu buatKomplain">
    <div class="title">
        <h1>
            Buat Komplain
        </h1>
    </div>
    <form method="POST" action="{{ url('komplain/'.$id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="flex">
            <div class="holder left-side">
                <img src="{{ asset('imgSepatu/'.$sepatu->photo) }}">
            </div>
            <div class="right-side">
                <div class="left">
                    <h5 class="item">Pesan:</h5>
                    <h5 class="item">Bukti:</h5>
                </div>
                <div class="right">
                    <input type="text" class="item" name="pesan" value="{{ old('pesan') }}" autofocus>
                    <input type="file" class="item" name="photo">
                    
                    <div class="container-button">
                        <button class="btn1 bg-color-secondary text-white" type="submit">
                            Kirim
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
</div>
@endsection