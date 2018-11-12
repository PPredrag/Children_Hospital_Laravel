@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <h3 class="inline"><p class="naslov">Sistematski Pregled Pacijenta</p></h3>
    
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
  <div class="content">
    <div class="row">
      <div class="col-sm-10 col-md-offset-1">
        @if(session('success'))
        <p class="zeleno" id="sakri">{{session('success')}}</strong>
          @endif
          <form class="form" action="{{route('sistematskiUpis')}}" method="post">
            <div class="form-group">
              <label for="sel1">Odaberi Godinu</label>
              <select class="form-control padajuci1" id="sel1" name="godina">
                <option  disabled="true" selected="true">Odaberite Godinu....</option>
                <option value="0">Do Prve Godine</option>
                <option value="1">Prva Godina</option>
                <option value="2">Druga Godina</option>
                <option value="3">Treca Godina</option>
                <option value="4">Četvrta Godina</option>
                <option value="5">Peta Godina</option>
                <option value="6">Pred Školu</option>
                <option value="Posle7">7-14 Godina</option>
              </select>
            </div>
            @if ($errors->has('godina'))
            <span class="help-block">
              <strong class="crvenaPoruka">{{ $errors->first('godina') }}</strong>
            </span>
            @endif
            <div class="form-group">
              <label for="sel2">Odaberite Mesec</label>
              <select class="form-control" id="sel12" name="mesec">
                <option value="" disabled="true" selected="true">Odaberite Mesec....</option>
                <option value="1">Prvi Mesec</option>
                <option value="2">Drugi Mesec</option>
                <option value="3">Treći Mesec</option>
                <option value="4">Četvrti Mesec</option>
                <option value="5">Peti Mesec</option>
                <option value="6">Šesti Mesec</option>
                <option value="7">Sedmi Mesec</option>
                <option value="8">osmi Mesec</option>
                <option value="9">Deveti Mesec</option>
                <option value="10">Deseti Mesec</option>
                <option value="11">Jedanesti Mesec</option>
              </select>
            </div>
            @if ($errors->has('mesec'))
            <span class="help-block">
              <strong class="crvenaPoruka">{{ $errors->first('mesec') }}</strong>
            </span>
            @endif
            <div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 10px;">
              <label for="name" class="control-label">Težina Deteta:</label>
              <input type="text"  class="form-control" name="tezina" placeholder="{{ Session::get('tezinaF')}}" value="{{ old('tezina') }}">
              
              @if ($errors->has('tezina'))
              <span class="help-block">
                <strong class="crvenaPoruka">{{ $errors->first('tezina') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 10px;">
              <label for="name" class="control-label">Dužina Deteta:</label>
              <input type="text"  class="form-control" name="duzina" placeholder="{{ Session::get('duzinaF')}}" value="{{ old('duzina') }}">
              
              @if ($errors->has('duzina'))
              <span class="help-block">
                <strong class="crvenaPoruka">{{ $errors->first('duzina') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group col-xs-4 col-md-4" style="padding: 0;">
              <label for="name" class="control-label">Obim Glave:</label>
              <input type="text"  class="form-control" name="obim" placeholder="{{ Session::get('obimF')}}" value="{{ old('obim') }}">
              
              @if ($errors->has('obim'))
              <span class="help-block">
                <strong class="crvenaPoruka">{{ $errors->first('obim') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 10px;">
              <label for="" class="control-label">Ishrana:</label>
              <select class="form-control padajuci1" id="" name="ishrana">
                <option  disabled="true" selected="true">Vrsta Ishrane</option>
                <option value="dojenje">Dojenje</option>
                <option value="dohrana">Dohrana</option>
                <option value="normalna">Normalana Ishrana</option>
              </select>
              
              @if ($errors->has('ishrana'))
              <span class="help-block">
                <strong class="crvenaPoruka">{{ $errors->first('ishrana') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 10px;">
              <label for="name" class="control-label">Vakcinisanje</label>
              <input type="text"  class="form-control" name="vakcina" placeholder="{{ Session::get('vakcinaF')}}" value="{{ old('vakcina') }}">
              
              @if ($errors->has('vakcina'))
              <span class="help-block">
                <strong class="crvenaPoruka">{{ $errors->first('vakcina') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group col-xs-4 col-md-4" style="padding: 0;">
              <label for="name" class="control-label">Zubi:</label>
              <input type="text"  class="form-control" name="zubi" placeholder="{{ Session::get('zubiF')}}" value="{{ old('zubi') }}">
              
              @if ($errors->has('zubi'))
              <span class="help-block">
                <strong class="crvenaPoruka">{{ $errors->first('zubi') }}</strong>
              </span>
              @endif
            </div>
            <label for="sel1">Krvna Slika:</label>
            <select class="form-control padajuci1" id="krvnaSlika" name="krvnaSlika">
              <option  disabled="true" selected="true"> Krvna Slika</option>
              <option value="Nije_Radjena">Ne</option>
              <option value="da">Da</option>
            </select>
            @if ($errors->has('krvnaSlika'))
            <span class="help-block">
              <strong class="crvenaPoruka">{{ $errors->first('krvnaSlika') }}</strong>
            </span>
            @endif
            <br>
            <div class="form-group" id="da">
              <label for="krv">Rezultati Krvne Slike:</label>
              <textarea class="form-control" rows="4"  id="da" name="krv" placeholder="Unesite Rezultate Analize Krvi" style="border-color: #c61313;">{{ old('krv') }}{{ Session::get('krv2F')}}</textarea>
            </div>
            <label for="sel1">Snimanje Kukova:</label>
            <select class="form-control padajuci1" id="kukovi" name="kuk">
              <option  disabled="true" selected="true">Snimanje Kukova</option>
              <option value="Nisu_Snimani">Ne</option>
              <option value="daa">Da</option>
            </select>
            @if ($errors->has('kuk'))
            <span class="help-block">
              <strong class="crvenaPoruka">{{ $errors->first('kuk') }}</strong>
            </span>
            @endif
            <br>
            <div class="form-group" id="daa">
              <label for="krv">Izvestaj Snimanja Kukova:</label>
              <textarea class="form-control" rows="4"  id="daa" name="kukovi" placeholder="Unesite Rezultate Snimanja Kukova" style="border-color: #c61313;">{{ old('kukovi') }} {{ Session::get('kukovi2F')}}</textarea>
              @if ($errors->has('kukovi'))
              <span class="help-block">
                <strong class="crvenaPoruka">{{ $errors->first('kukovi') }}</strong>
              </span>
              @endif
            </div>
            <div class="form-group" id="">
              <label for="krv">Izvestaj Sistematskog Pregleda</label>
              <textarea class="form-control" rows="4"  id="unos" name="opis" placeholder="Unesite Zaključak Sistematskog Pregleda">{{ old('opis') }}{{ Session::get('zakljucakF')}}</textarea>
              @if ($errors->has('opis'))
              <span class="help-block">
                <strong class="crvenaPoruka">{{ $errors->first('opis') }}</strong>
              </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary" style="float: left; display:inline-block;margin-right: 5px;>
            <i class="fa fa-btn fa-user"></i> Evidencija Sistematskog
            </button>
            {{ csrf_field() }}
          </form>
          <div class="dugmeStampa"><a href="{{ url('printSistematski') }}" class="stampa"> Štampa</a></div>
          <div style="float: right; display:inline-block;">
            <form action="{{ route('naplanaSis')}}" method="post">
              <input type="hidden" value="{{ Session::get('sistematski') }}" name="sistematski">
              {{ csrf_field() }}
              <a href=""><button type="submit" class="btn btn-primary " style="float: right;" id="klik"><i class="fa fa-btn fa-money"></i> Naplata Sistematskog </button></a>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endsection
    @section('footer')
    <script type="text/javascript" src="{{ asset('javaScript/jquery.printPage.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javaScript/sakri.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javaScript/krv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javaScript/kukovi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javaScript/naplata.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javaScript/print.js') }}"></script>
    @endsection