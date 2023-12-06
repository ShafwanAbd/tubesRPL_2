@extends('layouts.layout1')

@section('content')
<div class="buatSepatu lihatKomplain">
    <div class="title">
        <h1>
            Lihat Komplain
        </h1>
    </div>
    <div class="flex">
        <div class="holder left-side">
            <img src="{{ asset('imgSepatu/'.$sepatu->photo) }}">
        </div>
        <div class="right-side">
            <div class="left">
                <h5 class="item">Nama:</h5>
                <h5 class="item">Email:</h5>
                <h5 class="item">Nama Sepatu:</h5>
                <h5 class="item">Pesan:</h5>
                <h5 class="item">Bukti:</h5>
            </div>
            <div class="right">
                <h5 class="item">{{ $datas->nama }}</h5>
                <h5 class="item">{{ $datas->email }}</h5>
                <h5 class="item">{{ $datas->namaSepatu }}</h5>
                <h5 class="item">{{ $datas->pesan }}</h5>
                @if(strlen($datas->photo) > 0)
                    <a href="#" class="item">
                        <button class="btn2" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                        Lihat
                        </button>
                    </a>
                @else
                    <a class="item">
                        <button class="btn2 disabled">
                        Tidak Ada
                        </button>
                    </a>
                @endif

                <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if(str_contains($datas->photo, ".png") || str_contains($datas->photo, ".jpg") || str_contains($datas->photo, ".jpeg"))
                            <img src="{{ asset('imgKomplain/'.$datas->photo) }}">
                            @else
                            <video controls>
                                <source src="{{ asset('imgKomplain/'.$datas->photo) }}">
                                Your browser does not support the video tag.
                            </video>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-color-primary text-white" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                
                <div class="container-button">
                    <form method="POST" action="{{ url('komplain/'.$id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn1 bg-color-secondary text-white" type="submit">
                            Tukarkan Barang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection