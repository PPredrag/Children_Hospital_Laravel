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
              </button></a>
            </td>
          </div>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
<div class="container">
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    @if(session('success'))
    <p class="zeleno" id="sakri">{{session('success')}}</strong>
      @endif
      @if(count($data)>0)
      @foreach($data as $da)
      <form  class="form-horizontal" role="form" method="post" action="{{ url('promeniAlergiju/'.$da->id)}}">
        <div class="form-group{{ $errors->has('alergija') ? ' has-error' : '' }}">
          <label for="comment" >Alergije</label>
          <textarea class="form-control" rows="4"  id="comment" name="alergija" value="{{ Request::old('alergija')}}">{{$poruka}}</textarea>
          @if ($errors->has('alergija'))
          <span class="help-block">
            <strong>{{ $errors->first('alergija') }}</strong>
          </span>
          @endif
        </div>
        <button type="submit" class="btn btn-primary">
        <i class="fa fa-btn fa-user"></i>Ažuriraj Podatke
        </button>
        <input type="hidden" name="_token" value="{{Session::token()}}">
      </form>
      @endforeach
      @else
      <p class="zeleno"><strong>{{ $poruka }}</strong></p>
      @endif
    </div>
  </div>
</div>
@endsection
@section('footer')
<script type="text/javascript" src="{{ asset('javaScript/sakri.js') }}"></script>
@endsection