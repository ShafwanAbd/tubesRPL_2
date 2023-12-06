@extends('layouts.layout1')

@section('content')
<div class="shop">
    <div class="holder left-side">

    <h3>Semua Kategori</h3>

    <div class="container-search-dd">
        <div class="search-dd">
            <form method="GET" action="{{ url('sepatu') }}">
                <input type="text" name="keywordNama" class="textinput" value="{{ $keywordNama }}"  placeholder="Nama">
            </form>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordNama=proto') }}">Proto</a></li>
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordNama=gazelle') }}">Gazelle</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-search-dd">
        <div class="search-dd">
            <form method="GET" action="{{ url('sepatu') }}">
                <input type="text" name="keywordMerk" class="textinput" value="{{ $keywordMerk }}"  placeholder="Merek">
            </form>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordMerk=compass') }}">Compass</a></li>
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordMerk=geoff-max') }}">Geoff-Max</a></li>
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordMerk=ventella') }}">Ventella</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-search-dd">
        <div class="search-dd">
            <form method="GET" action="{{ url('sepatu') }}">
                <input type="text" name="keywordUkuran" class="textinput" value="{{ $keywordUkuran }}"  placeholder="Ukuran">
            </form>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordSize=35') }}">35</a></li>
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordSize=36') }}">36</a></li>
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordSize=37') }}">37</a></li>
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordSize=38') }}">38</a></li>
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordSize=39') }}">39</a></li>
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordSize=40') }}">40</a></li>
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordSize=41') }}">41</a></li>
                    <li><a class="dropdown-item" href="{{ url('sepatu?keywordSize=42') }}">42</a></li>
                </ul>
            </div>
        </div>
    </div>

    </div>

    <div class="holder right-side">
    @if(Session::has('success'))
        <p class="alert alert-success" id="sixSeconds">{{ Session::get('success') }}</p>
    @endif
        @foreach($datas as $key=>$value)
        <a class="card" style="width: 18rem;" href="{{ url('sepatu/'.$value->id) }}">
            <div class="container-img">
                @if (strlen($value->photo) > 0)
                    <img src="{{ asset('imgSepatu/'.$value->photo) }}" class="card-img-top" alt="...">
                @else
                    <img src="{{ asset('img/sepatu1.png') }}" class="card-img-top" alt="...">
                @endif
            </div>
            <div class="card-body">
                <h4 class="card-title">{{ $value->nama }}</h4>
                <h5 class="card-title">{{ $value->merk }}</h5>
                <p class="card-text harga">IDR {{ $value->harga }}</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection