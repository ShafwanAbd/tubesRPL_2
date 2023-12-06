@extends('layouts.layout1')

@section('content')
<div class="profile">
    @if(Session::has('success'))
        <p class="alert alert-success" id="sixSeconds">{{ Session::get('success') }}</p>
    @endif
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
            <h1>Profile</h1>
            <div class="flex">
                <div class="inner-left-side">
                    <h5 class="item">Nama: </h5>
                    <h5 class="item">Email: </h5>
                    <h5 class="item">Alamat: </h5>
                    <h5 class="item">Nomor HP: </h5>
                </div>
                <div class="inner-right-side">
                    @if ( $datas->name == "ADMIN")
                        <h5 class="item">{{ $datas->name }}</h5>
                        <h5 class="item">{{ $datas->name }}</h5>
                        <h5 class="item">{{ $datas->name }}</h5>
                        <h5 class="item">{{ $datas->name }}</h5>
                    @else
                        <h5 class="item">{{ $datas->name }}</h5>
                        <h5 class="item">{{ $datas->email }}</h5>
                        <h5 class="item">{{ $datas->alamat }}</h5>
                        <h5 class="item">{{ $datas->nomerHP }}</h5>
                    @endif
                </div>
            </div>
            @if ( $datas->name != "ADMIN")
                <div class="sector-1">
                    <a href="{{ url('profile/'.$datas->id.'/edit') }}"><button class="btn1">Edit Profile</button></a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection