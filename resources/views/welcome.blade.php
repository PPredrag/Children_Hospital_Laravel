@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" >
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if(Auth::check())
                <div class="panel-heading" id="pocetak"><h3 class="siva">Dobro Došli  &nbsp{{ Auth::user()->name }}</h3></div>
                <a href="{{ url('/home')}}"><img src="{{asset('images/doktor2.jpg')}}" alt="slika" class="slika"></a>
                <h3 class="siva" id="pocetak">Dobro Došli u Dečiju Kliniku Doktorčić  </h3>
                <div class="panel-body" id="pocetak"> 
                    @else
                    <div class="panel-heading" id="pocetak"><h3 class="siva">Dobro Došli u Dečiju Kliniku Doktorčić</h3></div>
                    <a href="{{ url('/login') }}"> <img src="{{asset('images/doktor2.jpg')}}" alt="Novi Pacijent" class="slika"></a>
                    <div class="panel-body" id="pocetak">
                        <a href="{{ url('/login') }}" class="h4"></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection