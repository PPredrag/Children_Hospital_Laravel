@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <h3 class="inline"><p class="naslov">Izdate Potvrde</p></h3>
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
  <div class="col-md-10 col-md-offset-1">
    @foreach ($data as $da)
    <p class="textSredina"> <b> DATUM :    {{date('F d, Y', strtotime($da->created_at))}}</b></p><br>
    <label for="potvrda">Potvrda</label>
    <textarea name="potvrda" class="form-control" id="potvrda" cols="10" rows="8">{{$da->opis}}</textarea><br><br>
    
    @endforeach
    <div class="dugmeStampa"><a href="{{ url('printPrkaziJednuPotvrdu') }}" class="stampa"> Štampa</a></div>
  </div>
  @endsection
  @section('footer')
  <script type="text/javascript" src="{{ asset('javaScript/jquery.printPage.js') }}"></script>
  <script type="text/javascript" src="{{ asset('javaScript/print.js') }}"></script>
  @endsection