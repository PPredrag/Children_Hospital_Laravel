@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-7 col-md-offset-2">
      @if(session('success'))
      <p class="zeleno" id="sakri">{{session('success')}}</strong>
        @endif
        
        <form action="{{ url('noveCene/'.$id) }}" method="get">
          <div class="form-group">
            <label for="">Pregled i Dijagnoza</label>
            <input type="text" class="form-control" id=""  placeholder="{{ Session::get('pregled') }}" value="{{ Session::get('pregled') }}" name="pregled">
            <small id="emailHelp" class="form-text text-muted">Unesite cenu za pregled</small>
          </div>
          <div class="form-group">
            <label for="">Kraj Pregleda</label>
            <input type="text" class="form-control" id=""  placeholder="{{ Session::get('kraj') }}" value="{{ Session::get('kraj') }}" name="kraj">
            <small id="emailHelp" class="form-text text-muted">Unesite cenu za pregled</small>
          </div>
          <div class="form-group">
            <label for="">Izdavanje Potvrde</label>
            <input type="text" class="form-control" id=""  placeholder="{{ Session::get('potvrda') }}" value="{{ Session::get('potvrda') }}" name="potvrda">
            <small id="emailHelp" class="form-text text-muted">Unesite cenu za pregled</small>
          </div>
          <div class="form-group">
            <label for="">Vakcinisanje</label>
            <input type="text" class="form-control" id=""  placeholder="{{ Session::get('vakcina') }}" value="{{ Session::get('vakcina') }}" name="vakcina">
            <small id="emailHelp" class="form-text text-muted">Unesite cenu za pregled</small>
          </div>
          <div class="form-group">
            <label for="">Previjanje Rane</label>
            <input type="text" class="form-control" id=""  placeholder="{{ Session::get('rane') }}" value="{{ Session::get('rane') }}" name="rane">
            <small id="emailHelp" class="form-text text-muted">Unesite cenu za pregled</small>
          </div>
          <div class="form-group">
            <label for="">Sistematski Pregled</label>
            <input type="text" class="form-control" id=""  placeholder="{{ Session::get('sistematski') }}" value="{{ Session::get('sistematski') }}" name="sistematski">
            <small id="emailHelp" class="form-text text-muted">Unesite cenu za pregled</small>
          </div>
          
          <button type="submit" class="btn btn-primary">Upiši Podatke</button>
        </form>
      </select>
    </div>
  </div>
</div>
@endsection