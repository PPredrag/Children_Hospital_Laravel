@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <table class="table">
      <tbody>
        <tr>
          <td>
            <div class="panel-heading"><h3 class="inline">{{Session::get('ime') }} {{Session::get('roditelj') }}
              {{Session::get('prezime') }} {{Session::get('godiste') }} godiste</h3>
            </td>
          </div>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <a href="{{ route('prikaziPacijenta')}}"> <button type="button" class="btn btn-link btn-lg btn-block" >
          <i class="fa fa-btn fa-user"></i>Istorija Dolazaka
        </button></a><br>
        <a href="{{ route('korisceniLekovi')}}"> <button type="button" class="btn btn-link btn-lg btn-block" >
          <i class="fa fa-btn fa-user"></i>Korisćeni Lekovi
        </button></a><br>
        <a href="{{ route('terapije') }}"> <button type="button" class="btn btn-link btn-lg btn-block" >
          <i class="fa fa-btn fa-user"></i>Istorija Lečenja
        </button></a><br>
        <a href="{{ route('spisakDijagnoza') }}"> <button type="button" class="btn btn-link btn-lg btn-block" >
          <i class="fa fa-btn fa-user"></i>Spisak Dijagnoza
        </button></a><br>
        <a href="{{ route('prikaziPotvrde') }}"> <button type="button" class="btn btn-link btn-lg btn-block" >
          <i class="fa fa-btn fa-user"></i>Izdate Potvrde
        </button></a><br>
        <a href="{{ route('spisakPrimljenihVakcina') }}"> <button type="button" class="btn btn-link btn-lg btn-block" >
          <i class="fa fa-btn fa-user"></i>Spisak Primljenih Vakcina
        </button></a><br>
        <a href="{{ route('spisakPrevijanja')}} "> <button type="button" class="btn btn-link btn-lg btn-block" >
          <i class="fa fa-btn fa-user"></i>Spisak Previjenih Rana
        </button></a><br>
        <a href="{{ route('prikaziSistematski')}} "> <button type="button" class="btn btn-link btn-lg btn-block" >
          <i class="fa fa-btn fa-user"></i>Sistematski Pregledi
        </button></a><br>
        <a href="{{route('prikaziAlergije')}}"> <button type="button" class="btn btn-danger btn-lg btn-block" >
          <i class="fa fa-btn fa-user"></i>Alergije
        </button></a><br>
        <a href="{{route('pacijent')}}"> <button type="button" class="btn btn-primary btn-md btn-success" >
          <i class="fa fa-angle-double-left"></i> Pregled i Dijagnoza
        </button>  </a>
        <a href="{{route('vrstePregleda')}}"><button class="btn btn-warning">Vrste Pregleda</button></a><br><br>
        
      </div>
    </div>
  </div>
  @endsection