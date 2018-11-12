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
<div class="col-md-6 col-md-offset-4">
  @foreach ($data as $da)
  <b> DATUM :    {{date('F d, Y', strtotime($da->created_at))}}</b><br>
  @endforeach
</div>
<br>
<div class="col-md-10 col-md-offset-1">
  @foreach ($data as $da)
  <form  class="form-horizontal" role="form" method="post" action="{{route('azurirajPodatke')}}">
    
    <div class="form-group">
      <label for="comment"> Simptomi</label>
      <textarea class="form-control" rows="4"  id="comment" name="simptomi" value="{{ Request::old('simptomi')}}">{{$da->simptomi}}</textarea>
    </div>
    <div class="form-group">
      <label for="comment">Dijagnoza</label>
      <textarea class="form-control" rows="4" id="comment" name="dijagnoza" value="{{ Request::old('dijagnoza')}}">{{$da->dijagnoza}}</textarea>
    </div>
    <div class="form-group">
      <label for="comment">Lecenje</label>
      <textarea class="form-control" rows="4" id="comment" name="lecenje" value="{{ Request::old('lecenje')}}">{{$da->lecenje}}</textarea>
    </div>
    <div class="form-group">
      <label for="comment">Medikamenti</label>
      <textarea class="form-control" rows="4" id="comment" name="lek" value="{{ Request::old('lek')}}">{{$da->lek}}</textarea>
    </div>
    <input type="hidden" name="_token" value="{{Session::token()}}">
    @endforeach
  </form>
  <div class="dugmeStampa"><a href="{{ url('printJednoLecenje')}}" class="stampa" > Štampa</a></div>
</div>
@endsection
@section('footer')
<script type="text/javascript" src="{{ asset('javaScript/jquery.printPage.js') }}"></script>
<script type="text/javascript" src="{{ asset('javaScript/print.js') }}"></script>
@endsection