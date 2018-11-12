@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <h3 class="inline"><p class="naslov">Vakcinisanje Pacijenta</p></h3>
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
  <p class="crveno">PACIJENT NEMA EVIDENTIRAN KARTON SA PRIJMLJENIM VAKCINAMA</strong></p><br>
  <a href="{{url('evidentirajPacijenta')}}"> <button type="button" class="btn btn-primary btn-md btn-success" >
    <i class=""></i>Evidentieraj Vakcine
  </button>  </a>
</div>
</div>
@endsection