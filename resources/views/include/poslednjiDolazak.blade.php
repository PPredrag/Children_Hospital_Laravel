@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
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
</div>
</br>
<div class="col-md-10 col-md-offset-1">
@if($podatak>0)
<div class="panel panel-default">
  <div class="panel-heading textSredina"><b>Nastavak Lečenja od {{date('F d, Y', strtotime($data->created_at))}}</b></div>
  <div class="col-md-6 col-md-offset-4">
  </div>
</div>
</div>
</div>
</br>
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
  @if(session('success'))
  <p class="zeleno" id="sakri">{{session('success')}}</strong>
    @endif
    <form  class="form-horizontal" role="form" method="post" action="{{ url('azurirajLecenje/'.$data->id) }}">
      
      <div class="form-group">
        <label for="simptomi"> Simptomi</label>
        <textarea class="form-control" rows="4"  id="simptomi" name="simptomi" >{{$data->simptomi}}</textarea>
      </div>
      @if ($errors->has('simptomi'))
      <span class="help-block">
        <strong class="crvenaPoruka">{{ $errors->first('simptomi') }}</strong>
      </span>
      @endif
      <div class="form-group">
        <label for="comment">Dijagnoza</label>
        <textarea class="form-control" rows="4" id="comment" name="dijagnoza" >{{$data->dijagnoza}}</textarea>
      </div>
      @if ($errors->has('dijagnoza'))
      <span class="help-block">
        <strong class="crvenaPoruka">{{ $errors->first('dijagnoza') }}</strong>
      </span>
      @endif
      <div class="form-group">
        <label for="comment">Lecenje</label>
        <textarea class="form-control" rows="4" id="comment" name="lecenje" >{{$data->lecenje}}</textarea>
      </div>
      @if ($errors->has('lecenje'))
      <span class="help-block">
        <strong class="crvenaPoruka">{{ $errors->first('lecenje') }}</strong>
      </span>
      @endif
      <div class="form-group">
        <label for="lek">Medikamenti</label>
        <textarea class="form-control" rows="4" id="lek" name="lek" >{{$data->lek}}</textarea>
      </div>
      @if ($errors->has('lek'))
      <span class="help-block">
        <strong class="crvenaPoruka">{{ $errors->first('lek') }}</strong>
      </span>
      @endif
      <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-user"></i> Nastavak Lečenja</button>
        <input type="hidden" name="_token" value="{{Session::token()}}">
      </form>
      <div class="dugmeStampa"><a href="{{ url('printPregled') }}" class="stampa"> Štampa</a></div>
    </div>
  </div>
</div>
@else
<p class="crveno"><b>PACIJENT SA OVIM PODACIMA NEMA EVIDENTIRAN PREGLED</b></p>
@endif
@endsection
@section('footer')
<script type="text/javascript" src="{{ asset('javaScript/jquery.printPage.js') }}"></script>
<script type="text/javascript" src="{{ asset('javaScript/print.js') }}"></script>
<script type="text/javascript" src="{{ asset('javaScript/sakri.js') }}"></script>
@endsection