@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <h3 class="inline"><p class="naslov">Korišćeni Lekovi</p></h3>
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
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    @if(count($data)>0)
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col" class="wrap">Dijagnoza</th>
          <th scope="col" class="wrap">Medikamenti</th>
          <th scope="col" class="wrap">Datum</th>
          <th scope="col" class="wrap">Doktor</th>
          <th class="wrap"> Prikazi Lekove</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $podatak)
        <tr>
          <td class="wrap">{{$podatak->dijagnoza}}</td>
          <td class="wrap">{{$podatak->lek}}</td>
          <td class="wrap">{{date('F d, Y', strtotime($podatak->created_at))}}</td>
          <td class="wrap"  class="wrap">{{$podatak->name}}</td>
          <td  class="wrap"><a href="{{url('prikaziLekove/'.$podatak->id)}}"> <button type="button" class="btn btn-primary" >
          <i class="fa fa-angle"></i> Prikazi Lekove</button></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="col-md-6 col-md-offset-4">
      {{ $data->links() }}
    </div>
    @else
    <p class="crveno"><b>PACIJENT SA OVIM PODACIMA NEMA EVIDENTIRANE LEKOVE</b></p>
    @endif
    
    
    @endsection()