@extends('layouts.app')
@section('content')
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
</div>
</div>
</br>
<div class="row">
<div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
    <div class="panel-heading"><b>Pregled i Dijagnoza Pacijenta</b></div>
  </div></div></div></br>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-2">
        
        
        <form  class="form-horizontal" role="form" method="post" action="{{route('test')}}">
          <input type="hidden" name="id_pacijent" value={{$member->id}}>
          <div class="form-group">
            <label for="comment"> Simptomi</label>
            <textarea class="form-control" rows="4"  id="comment" name="simptomi" value="{{ Request::old('simptomi')}}"></textarea>
          </div>
          <div class="form-group">
            <label for="comment">Dijagnoza</label>
            <textarea class="form-control" rows="4" id="comment" name="dijagnoza" value="{{ Request::old('dijagnoza')}}"></textarea>
          </div>
          <div class="form-group">
            <label for="comment">Lecenje</label>
            <textarea class="form-control" rows="4" id="comment" name="lecenje" value="{{ Request::old('lecenje')}}"></textarea>
          </div>
          <div class="form-group">
            <label for="comment">Medikamenti</label>
            <textarea class="form-control" rows="4" id="comment" name="lek" value="{{ Request::old('lek')}}"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i> Upisi Podatke
            </button>
            
          </div>
          <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
        <button type="submit" class="btn btn-primary">
        <i class="fa fa-btn fa-user"></i> Nastavak Lečenja
        </button>
        <button type="submit" class="btn btn-success ">
        <i class="fa fa-btn fa-print"></i> Štampa
        </button>
      </div>
    </div>
  </div>
  @endsection