@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <h3 class="inline"><p class="naslov">Sistematski</p></h3>
    <table class="table">
      <tbody>
        <tr>
          <td>
          <div class="panel-heading" ><h3 class="inline">{{Session::get('ime') }} {{Session::get('roditelj') }} {{Session::get('prezime') }} {{Session::get('godiste') }} godiste</h3></td>
          <td>
            <a href="{{route('istorijaPacijenta')}}"> <button type="button" class="btn btn-primary" id="desno" >
              <i class="fa fa-btn fa-user"></i> Karton Pacijenta
            </button></a>
            <a href="{{route('vrstePregleda')}}"> <button type="button" class="btn btn-warning" id="desno" >
              <i class="fa fa-btn fa-user"></i> Novi Pregled
            </button></a>
            <a href="{{route('pacijent')}}"> <button type="button" class="btn btn-primary btn-md btn-success" id="desno" >
              <i class="fa fa-angle-double-left"></i> Pregled i Dijagnoza
            </button>  </a>
            
          </td>
        </div>
      </tr>
    </tbody>
  </table>
  @foreach($data as $da)
  <p class="textSredina"> <b> DATUM :    {{date('F d, Y', strtotime($da->created_at))}}</b></p>
  <div class="form-group col-xs-2 col-md-6" style="padding: 0; padding-right: 10px;">
    <label for="name" class="control-label">Godina:</label>
    <input type="text"  class="form-control" name="" placeholder="" value="{{ $da->godina}}">
  </div>
  <div class="form-group col-xs-2 col-md-6" style="padding: 0;">
    <label for="name" class="control-label">Mesec:</label>
    <input type="text"  class="form-control" name="tezina" placeholder="" value="{{ $da->mesec}}">
  </div>
  <div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 10px;">
    <label for="name" class="control-label">Težina Deteta:</label>
    <input type="text"  class="form-control" name="tezina" placeholder="" value="{{ $da->tezina}} kg"">
  </div>
  <div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 10px;">
    <label for="name" class="control-label">Dužina Deteta:</label>
    <input type="text"  class="form-control" name="duzina" placeholder="" value="{{ $da->duzina}} cm">
  </div>
  <div class="form-group col-xs-4 col-md-4" style="padding: 0;">
    <label for="name" class="control-label">Obim Glave:</label>
    <input type="text"  class="form-control" name="obim" placeholder="" value="{{ $da->obim}} cm">
  </div>
  <div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 10px;">
    <label for="name" class="control-label">Ishrana:</label>
    <input type="text"  class="form-control" name="tezina" placeholder="" value="{{ $da->ishrana}}">
  </div>
  <div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 10px;">
    <label for="name" class="control-label">Vakcinisanje</label>
    <input type="text"  class="form-control" name="vakcina" placeholder="" value="{{ $da->vakcina}}">
  </div>
  <div class="form-group col-xs-4 col-md-4" style="padding: 0;">
    <label for="name" class="control-label">Zubi:</label>
    <input type="text"  class="form-control" name="zubi" placeholder="" value="{{ $da->zubi}}">
  </div>
  <div class="form-group" id="da">
    <label for="krv">Rezultati Krvne Slike:</label>
    <textarea class="form-control" rows="3"  id="da" name="krv" placeholder="" >{{ ($da->krv) ? $da->krv : 'Krv Nije Vadjena' }}</textarea>
  </div>
  <div class="form-group" id="daa">
    <label for="krv">Izvestaj Snimanja Kukova:</label>
    <textarea class="form-control" rows="3"  id="daa" name="kukovi" placeholder="">{{ ($da->kukovi) ? $da->kukovi : 'Snimak Kukova Nije Radjen' }}</textarea>
  </div>
  <div class="form-group" id="">
    <label for="krv">Izvestaj Sistematskog Pregleda</label>
    <textarea class="form-control" rows="3"  id="unos" name="opis" placeholder="">{{ $da->zakljucak}}</textarea>
  </div>
  @endforeach
  <div class="dugmeStampa"><a href="{{ url('printJedanSistematski') }}" class="stampa"> Štampa</a></div>
  @endsection()
  @section('footer')
  <script type="text/javascript" src="{{ asset('javaScript/jquery.printPage.js') }}"></script>
  <script type="text/javascript" src="{{ asset('javaScript/print.js') }}"></script>
  @endsection