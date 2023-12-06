@extends('layouts.layout1')

@section('content')
<form method="POST" action="{{ url('profile/'.$datas->id) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="profile edit">
        <div class="container-one">
            <div class="left-side">
                <div class="container-img">
                    @if (strlen($datas->photo) > 0)
                        <img src="{{ asset('imgProfile/'.$datas->photo)}}">
                    @else
                        <img src="{{ asset('img/profile.png')}}">
                    @endif
                </div>
            </div>
            <div class="right-side"> 
                <h1>Edit Profile</h1>
                <div class="flex">
                    <div class="inner-left-side">
                        <h5 class="item">Nama: </h5>
                        <h5 class="item">Email: </h5>
                        <h5 class="item">Alamat: </h5>
                        <h5 class="item">Nomer HP: </h5>
                        <h5 class="item">Photo: </h5>
                    </div>
                    <div class="inner-right-side">
                        @if ( $datas->name == "ADMIN")
                            <h5 class="item">{{ $datas->name }}</h5>
                            <h5 class="item">{{ $datas->name }}</h5>
                            <h5 class="item">{{ $datas->name }}</h5>
                            <h5 class="item">{{ $datas->name }}</h5>
                            <h5 class="item">{{ $datas->name }}</h5>
                        @else
                            <input class="item" type="text" name="name" value="{{ $datas->name }}">
                            <input class="item" type="text" name="email" value="{{ $datas->email }}">
                            <input class="item" type="text" name="alamat" value="{{ $datas->alamat}}">
                            <input class="item" type="text" name="nomerHP" value="{{ $datas->nomerHP }}">
                            <input class="item"type="file" name="photo">
                        @endif
                    </div>
                </div>
                <div class="sector-1">
                    <button type="submit" class="btn1">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection