@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading textSredina"><b>Registracija Pacijenta</b></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('registracija') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
                            <label for="ime" class="col-md-4 control-label">Ime</label>
                            <div class="col-md-6">
                                <input id="ime" type="text" class="form-control" name="ime" value="{{ old('ime') }}" placeholder="Ime Pacijenta">
                                @if ($errors->has('ime'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ime') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('prezime') ? ' has-error' : '' }}">
                            <label for="prezime" class="col-md-4 control-label">Prezime</label>
                            <div class="col-md-6">
                                <input id="prezime" type="text" class="form-control" name="prezime" value="{{ old('prezime') }}" placeholder="Prezime Pacijenta">
                                @if ($errors->has('prezime'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('prezime') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('imeroditelja') ? ' has-error' : '' }}">
                            <label for="imeroditelja" class="col-md-4 control-label">Ime Roditelja</label>
                            <div class="col-md-6">
                                <input id="imeroditelja" type="text" class="form-control" name="imeroditelja" value="{{ old('imeroditelja') }}" placeholder="Ime Jednog Roditelja">
                                @if ($errors->has('imeroditelja'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('imeroditelja') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('telefon') ? ' has-error' : '' }}">
                            <label for="telefon" class="col-md-4 control-label">Broj Belefona</label>
                            <div class="col-md-6">
                                <input id="telefon" type="text" class="form-control" name="telefon" value="{{ old('telefon') }}" placeholder="064112233">
                                @if ($errors->has('telefon'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefon') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('godiste') ? ' has-error' : '' }}">
                            <label for="godiste" class="col-md-4 control-label">Godiste</label>
                            <div class="col-md-6">
                                <input id="godiste" type="text" class="form-control" name="godiste" value="{{ old('godiste') }}" placeholder="2011">
                                @if ($errors->has('godiste'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('godiste') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lbo') ? ' has-error' : '' }}">
                            <label for="lbo" class="col-md-4 control-label">LBO Broj</label>
                            <div class="col-md-6">
                                <input id="lbo" type="text" class="form-control" name="lbo" value="{{old('lbo')}}" placeholder="12345678">
                                @if ($errors->has('lbo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lbo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email Adresa</label>
                            <div class="col-md-6">
                                <input id="lbo" type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="pera@gmail.com">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pol') ? ' has-error' : '' }}">
                            <label for="pol" class="col-md-4 control-label">Pol</label>
                            <div class="col-md-6">
                                <select name="pol" id="pol" class="form-control">.
                                    <option value="" >......</option>
                                    <option value="Muski">Muški</option>
                                    <option value="Zenski">Ženski</option>
                                </select>
                                @if ($errors->has('pol'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pol') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Registracija Pacijenta
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection