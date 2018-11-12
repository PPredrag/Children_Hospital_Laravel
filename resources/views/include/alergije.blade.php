@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <h3 class="inline"><p class="naslov" id="">Alergije Pacijenta</p></h3>
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
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
@if ($napomena == 0)
<div class="col-md-10 col-md-offset-1 zeleno">
{{ "Pacijent Nema Registrovane Alergije"}}
</div>
<br><br><br>
<div class="col-md-10 col-md-offset-1">
<form  class="form-horizontal" role="form" method="get" action="{{ route('alergija')}}">
  <div class="form-group{{ $errors->has('alergija') ? ' has-error' : '' }}">
    <label for="comment" >Alergije</label>
    <textarea class="form-control" rows="4"  id="comment" name="alergija" value="{{ Request::old('alergija')}}" placeholder="Upiši Alergiju"}"></textarea>
    @if ($errors->has('alergija'))
    <span class="help-block">
      <strong>{{ $errors->first('alergija') }}</strong>
    </span>
    @endif
    
  </div>
  <button type="submit" class="btn btn-primary">
  <i class="fa fa-btn fa-user"></i> Upisi Podatke
  </button>
  <input type="hidden" name="_token" value="{{Session::token()}}">
</form>
</div>
@else
@foreach ($data as $value)
<div class="col-md-10 col-md-offset-1 crveno">
{{ "Pacijent Ima Registrovane Alergije"}}
</div>
<div class="col-md-10 col-md-offset-1">
<form  class="form-horizontal" role="form" method="get" action="{{ route('alergija')}}">
  <div class="form-group{{ $errors->has('alergija') ? ' has-error' : '' }}">
    <label for="comment" >Alergije</label>
    <textarea class="form-control" rows="4"  id="comment" name="alergija" value="{{ Request::old('alergija')}}"  placeholder="{{ $poruka = $value->napomene }}"></textarea>
    @if ($errors->has('alergija'))
    <span class="help-block">
      <strong>{{ $errors->first('alergija') }}</strong>
    </span>
    @endif
    
  </div>
  <input type="hidden" name="_token" value="{{Session::token()}}">
</form>
<a href="{{route('prikaziAlergije')}}"> <button type="button" class="btn btn-primary" >
  <i class="fa fa-btn fa-user"></i>Pregledaj Alergije
</button></a>
</div>
@endforeach
@endif
@endsection