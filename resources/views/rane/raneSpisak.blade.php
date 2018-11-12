@extends('layouts.app')
@section('content')
<h3 class="inline"><p class="naslov">Spisak Previjenih Rana</p></h3>
<div class="container">
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
  @if(count($data)>0)
  <div class="col-md-10 col-md-offset-1">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col" class="wrap">Deo Tela</th>
          <th scope="col" class="wrap">Opis Povrede</th>
          <th scope="col" class="wrap">Terapija</th>
          <th scope="col" class="wrap">Doktor</th>
          <th scope="col" class="wrap">Datum</th>
          <th class="wrap">Prikaži Previjanje</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $da)
        <tr>
          <td class="wrap">{{$da->deoTela}}</td>
          <td class="wrap">{{$da->povreda}}</td>
          <td class="wrap">{{$da->terapija}}</td>
          <td class="wrap">{{$da->name}}</td>
          <td class="wrap">{{date('F d, Y', strtotime($da->created_at))}}</td>
          <td class="wrap">
            <a href="{{url('jednaRana/'.$da->id)}}"> <button type="button" class="btn btn-primary" >
              <i class="fa fa-angle"></i> Prikaži Previjanje
            </button>  </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="col-md-6 col-md-offset-4">
      {{ $data->links() }}
    </div>
    @else
    <p class="crveno"><b>PACIJENT SA OVIM PODACIMA NEMA EVIDENTIRANO PREVIJANJE RANA</b></p>
    @endif
  </div>
</div>
</div>
@endsection