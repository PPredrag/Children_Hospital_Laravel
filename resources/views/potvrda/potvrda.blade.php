@extends('layouts.app')
@section('content')
<div class="container">
  <h3 class="inline"><p class="naslov">Izdavanje Potvrde</p></h3>
  <table class="table">
    <tbody>
      <tr>
        <td><div class="panel-heading" ><h3 class="inline">{{Session::get('ime') }} {{Session::get('roditelj') }} {{Session::get('prezime') }} {{Session::get('godiste') }} godiste</h3></td>
      </tr>
    </tbody>
  </table>
  <div class="col-sm-10 col-md-offset-1">
    <a href="{{route('istorijaPacijenta')}}"> <button type="button" class="btn btn-primary"><i class="fa fa-angle fa-user"></i> Karton Pacijenta</button></a>
    <a href="{{route('vrstePregleda')}}"><button class="btn btn-warning">Vrste Pregleda</button></a><br><br>
    @if(session('success'))
    <p class="zeleno" id="sakri">{{session('success')}}</strong></p><br>
    @endif
    <form action="{{route('upisPotvrde')}}" method="post">
      <label for="">Unesite Potvrdu</label>
      <textarea name="potvrda" id="unos" cols="50" rows="5" class="form-control" value="{{old('potvrda')}}" placeholder="Unesite vrstu Potvrde">{{ Session::get('msg') }}</textarea><br>
      @if ($errors->has('potvrda'))
      <span class="help-block">
        <strong class="crvenaPoruka">{{ $errors->first('potvrda') }}</strong>
      </span>
      @endif
      <input type="hidden" value="{{Session::token()}}" name="_token">
      <div style="float: left; display: inline-block;">
        <button type="submit" class="btn btn-primary">
        <i class="fa fa-btn "></i>Evidentiraj Potvrdu
        </button>
        <a href="{{ route('prikaziPotvrde') }}"> <button type="button" class="btn btn-primary" >
          <i class="fa fa-btn "></i>Izdate Potvrde
        </button></a>
        <div class="dugmeStampa"><a href="{{ url('printPotvrda') }}" class="stampa"> Štampa</a></div>
      </div>
    </form>
    <form action="{{ route('naplataPotvrde')}}" method="post">
      <div style="float: right; display: inline-block;" >
        <input type="hidden" value="{{ Session::get('potvrda') }}" name="potvrda" >
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary" id="klik" style="float: right;"><i class="fa fa-btn fa-money"></i> Naplata Potvrde</button>
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