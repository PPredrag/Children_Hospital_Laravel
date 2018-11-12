@extends('layouts.app')
@section('content')
<div class="container">
  <h3 class="inline"><p class="naslov">Previjanje Rane Pacijenta</p></h3>
  
  <div class="row">
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
</div>
</div>
<style type="text/css">
</style>
<div class="content pozadina">
<div class="col-md-10 col-md-offset-1">
  @if(session('success'))
  <p class="zeleno" id="sakri">{{session('success')}}</strong>
    @endif
    <div class="form-group">
      <form  class="form-horizontal" role="form" method="post" action="{{route('upisiPrevijanje')}}">
        <label for="sel1">Odaberte Deo Tela</label>
        <select class="form-control padajuci1" id="sel1" name="telo">
          <option  disabled="true" selected="true">Odaberte Deo Tela</option>
          <option value="Glava">Glava</option>
          <option value="Trup Tela">Trup Tela</option>
          <option value="Leva Ruka">Leva Ruka</option>
          <option value="Desna Ruka">Desna Ruka</option>
          <option value="Leva Šaka">Leva Šaka</option>
          <option value="Desna Šaka">Desna Šaka</option>
          <option value="Leva Noga">Leva Noga</option>
          <option value="Desna Noga">Desna Noga</option>
          <option value="Desno Stopalo">Levo Stopalo</option>
          <option value="LevoStopalo">Desno Stopalo</option>
        </select></br>
        @if ($errors->has('telo'))
        <span class="help-block">
          <strong class="crvenaPoruka">{{ $errors->first('telo') }}</strong>
        </span>
        @endif
        <div id="povredaSlika">
          <label for="povreda" >Opis Povrede</label>
          <textarea class="form-control" rows="5"  id="unos" name="povreda" >{{ old('povreda') }} {{ Session::get('opisPovredeF') }}</textarea></br>
          @if ($errors->has('povreda'))
          <span class="help-block">
            <strong class="crvenaPoruka">{{ $errors->first('povreda') }}</strong>
          </span>
          @endif
          <label for="terapija">Terapija</label>
          <textarea class="form-control" rows="5" id="unos" name="terapija" >{{ old('terapija') }} {{ Session::get('terapijaF') }}</textarea></br>
          @if ($errors->has('terapija'))
          <span class="help-block">
            <strong class="crvenaPoruka">{{ $errors->first('terapija') }}</strong>
          </span>
          @endif
          <input type="hidden" name="_token" value="{{Session::token()}}">
          <div style="float: left; display: inline-block;">
            <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i>Upiši Podatke
            </button>
            <div class="dugmeStampa"><a href="{{ url('printRane') }}" class="stampa"> Štampa</a></div>
          </div>
        </form>
      </div>
      <form action="{{route('napaltaRane')}}" method="post">
        <div style="float: right; display: inline-block;">
          <input type="hidden" value="{{ Session::get('rane') }}" name="rana">
          {{ csrf_field() }}
          <a href=""><button type="submit" class="btn btn-primary " style="float: right;" id="klik"><i class="fa fa-btn fa-money"></i> Naplata Previjanja</button></a>
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