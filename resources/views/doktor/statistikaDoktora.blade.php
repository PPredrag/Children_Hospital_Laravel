@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			
			<h3 class="inline"><p class="naslov">Dobro Došli &nbsp{{ Auth::user()->name }}, odaberite jednu od opcija</p></h3><br><br>
			<a href="{{ route('zaradaPeriod') }}"><button type="button" class="btn btn-link btn-lg btn-block"><i class="fa fa-btn fa-money"></i> Zarada</button></a><br>
			<a href="{{ route('promenaCenovnika') }}"><button type="button" class="btn btn-link btn-lg btn-block"><i class="fa fa-btn fa-money"></i> Promena Cenovnika</button></a></br>
			<a href="{{ route('brisanjeZarade') }}"><button type="button" class="btn btn-link btn-lg btn-block"><i class="fa fa-btn fa-money"></i> Brisanje Poslednje Naplate</button></a></br>
			<a href="{{ route('brisanjePacijenta') }}"><button type="button" class="btn btn-link btn-lg btn-block"><i class="fa fa-btn fa-user"></i> Brisanje Podataka Pacijenta</button></br></a>
			<a href="{{route('promenaPodatakaDoktora')}}"><button type="button" class="btn btn-link btn-lg btn-block"><i class="fa fa-btn fa-user"></i> Promena Podataka Doktora</button></a></br>
		</div>
	</div>
</div>
@endsection