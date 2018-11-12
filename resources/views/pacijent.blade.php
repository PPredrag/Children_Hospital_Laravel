@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <h3 class="inline"><p class="naslov" id="">Pregled i Dijagnoza Pacijenta</p></h3>
    <table class="table">
      <tbody>
        <tr>
          <td><div class="panel-heading"><h3 class="inline">{{Session::get('ime') }} {{Session::get('roditelj') }} {{Session::get('prezime') }} {{Session::get('godiste') }} godiste</h3></td>
          <td>
            <a href="{{route('istorijaPacijenta')}}"> <button type="button" class="btn btn-primary" id="desno" >
              <i class="fa fa-btn fa-user"></i> Karton Pacijenta
            </button></a>
            <a href="{{route('vrstePregleda')}}"> <button type="button" class="btn btn-warning" id="desno">
              <i class="fa fa-btn fa-user"></i> Novi Pregled
            </button></a>
            <a href="{{route('napomene')}}"> <button type="button" class="btn btn-danger" id="desno" >
              <i class="fa fa-btn fa-user"></i> Unesi Alergije
            </button></a>
          </td>
        </tr>
      </tbody>
    </table>
    @if(session('success'))
    <p class="zeleno" id="sakri">{{session('success')}}</strong>
      @endif
      <p class="zeleno" id="napomena">Pre naplate morate Evidentirati Pregled</p>
      <div class="col-md-10 col-md-offset-1">
        <br>
        <form  class="form-horizontal" role="form" method="post" action="{{ route('upisDijagnoze')}}">
          
          <div class="form-group">
            <label for="simptomi"> Simptomi</label>
            <textarea class="form-control" rows="4"  id="unos" name="simptomi" >{{ old('simptomi') }}{{ Session::get('simptomiF') }}</textarea>
          </div>
          @if ($errors->has('simptomi'))
          <span class="help-block">
            <strong class="crvenaPoruka">{{ $errors->first('simptomi') }}</strong>
          </span>
          @endif
          <div class="form-group">
            <label for="comment">Dijagnoza</label>
            <textarea class="form-control" rows="4" id="unos" name="dijagnoza" >{{ old('dijagnoza')}} {{ Session::get('dijagnozaF') }} </textarea>
          </div>
          @if ($errors->has('dijagnoza'))
          <span class="help-block">
            <strong class="crvenaPoruka">{{ $errors->first('dijagnoza') }}</strong>
          </span>
          @endif
          <div class="form-group">
            <label for="comment">Lečenje</label>
            <textarea class="form-control" rows="4" id="unos" name="lecenje" >{{ old('lecenje')}} {{ Session::get('lecenjeF') }}</textarea>
          </div>
          @if ($errors->has('lecenje'))
          <span class="help-block">
            <strong class="crvenaPoruka">{{ $errors->first('lecenje') }}</strong>
          </span>
          @endif
          <div class="form-group">
            <label for="lek">Medikamenti</label>
            <textarea class="form-control" rows="4" id="unos"" name="lek" >{{ old('lek')}} {{ Session::get('lekF') }}</textarea>
          </div>
          @if ($errors->has('lek'))
          <span class="help-block">
            <strong class="crvenaPoruka">{{ $errors->first('lek') }}</strong>
          </span>
          @endif
          <div class="form-group" style="float: left; display: inline-block;">
            <button type="submit" class="btn btn-primary" id="evidencija">
            <i class="fa fa-btn fa-user"></i> Evidencija Pregleda
            </button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
          </form>
          <a href="{{url('poslednjiDolazak')}}"> <button type="button" class="btn btn-warning">
            <i class=""></i> Predhodni Dolazak
          </button></a>
          <form action="{{ route('zavrsiPregled')}}" method="get" style="display: inline-block;">
            <input type="hidden" value="{{ Session::get('krajPregled') }}" name="kraj">
            <button type="submit" class="btn btn-danger">
            <i class="fa fa-btn fa-user"></i> Kraj Lečenja
          </button></form>
          <div class="dugmeStampa"><a href="{{ url('printPregled') }}" class="stampa"> Štampa</a></div>
        </div>
        <form action="{{route('napaltaPregleda')}}" method="post">
          <div style="float: right; display: inline-block;">
            <input type="hidden" value="{{Session::get('pregled')}}" name="pregled">
            {{ csrf_field() }}
            <a href=""><button type="submit" class="btn btn-primary " style="float: right;" id="klik" ><i class="fa fa-btn fa-money"></i> Naplata Pregleda</button></a>
          </div>
        </form>
      </div>
      
    </div>
  </div>
  @endsection
  @section('footer')
  <script type="text/javascript" src="{{ asset('javaScript/jquery.printPage.js') }}"></script>
  <script type="text/javascript" src="{{ asset('javaScript/sakri.js') }}"></script>
  <script type="text/javascript" src="{{ asset('javaScript/naplata.js') }}"></script>
  <script type="text/javascript" src="{{ asset('javaScript/print.js') }}"></script>
  @endsection