@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel-heading"><h3 class="inline">{{Session::get('ime') }} {{Session::get('roditelj') }} {{Session::get('prezime') }} {{Session::get('godiste') }} godiste</h3></div><br><br>
      <a href="{{ route('pacijent')}}"> <button type="button" class="btn btn-link btn-lg btn-block" >
        <i class="fa fa-btn fa-user"></i>Pregled i Dijagnoza Pacijenta
      </button></a><br>
      <a href="{{route('potvrda')}}"> <button type="button" class="btn btn-link btn-lg btn-block" >
        <i class="fa fa-btn fa-user"></i>Izdavanje Potvrda
      </button></a><br>
      <!--<a href="{{route('vakcinisanje')}}"> <button type="button" class="btn btn-primary btn-lg btn-block" >
        <i class="fa fa-btn fa-user"></i>Vakcinisanje Pacijenta
      </button></a><br> -->
      <a href="{{route('upisZaVakcinu')}}"> <button type="button" class="btn btn-link btn-lg btn-block" >
        <i class="fa fa-btn fa-user"></i>Vakcinisanje Pacijenta
      </button></a><br>
      <a href="{{route('rane')}}"> <button type="button" class="btn btn-link btn-lg btn-block" >
        <i class="fa fa-btn fa-user"></i>Previjanje Rane
      </button></a><br>
      <a href="{{route('sistematski')}}"> <button type="button" class="btn btn-link btn-lg btn-block" >
        <i class="fa fa-btn fa-user"></i>Sistematski Pregled Pacijenta
      </button></a><br>
      <a href="{{route('istorijaPacijenta')}}"> <button type="button" class="btn btn-warning btn-lg btn-block" >
        <i class="fa fa-btn fa-user"></i>Karton Pacijenta
      </button></a><br>
    </div>
  </div>
</div>
@endsection