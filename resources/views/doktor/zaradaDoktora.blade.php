@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9 col-md-offset-1">
			<h3 class="inline"><p class="naslov">Zarada po periodu</p></h3>
			<form action="{{route('zaradaPeriod')}}" method="get">
				<select name="vreme" id="" class="form-control padajuci1">
					<option  disabled="true" selected="true" class="odaberi">Odaberite Period</option>
					<option value="1">Danas</option>
					<option value="7">Poslednjih 7 dana</option>
					<option value="30">Poslednjih 30 dana</option>
					<option value="180">Poslednjih 6 meseci</option>
					<option value="360">Poslednjih 12 meseci</option>
				</select></br>
				<a href=""><button type="subbmit" class="btn btn-primary "><i class="fa fa-btn fa-money"></i>Prikazi Zaradu</button></a></form></br></br></br>
				@if(count($data)>0)
				<table class="table">
					<thead>
						<tr>
							<th></th>
							<th>Pregeld i Dijagnoza</th>
							<th>Završen Pregled</th>
							<th>Potvrde</th>
							<th>Vakcinisanje</th>
							<th>Preivijanja</th>
							<th>Sistematski</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>Ukupno Naplaceno </th>
							<th class="wrap">{{$pre}},00 din</th>
							<th class="wrap">{{$krajPreg}},00 din</th>
							<th class="wrap">{{$pot}},00 din</th>
							<th class="wrap">{{$vkaci}},00 din</th>
							<th class="wrap">{{$ra}},00 din</th>
							<th class="wrap">{{$sis}},00 din</th>
						</tr>
						
					</tbody>
					
				</table>
				<h3 class="inline"><p class="naslov"> Zbir Svih Pregleda Iznosi: {{ $ukupno }},00 din</p></h3>
				<h3 class="inline"><p class="naslov"> Ukupan Broj Pregleda:{{ $brojPregleda }}</p></h3>
				@endif
			</div>
		</div>
	</div>
	@endsection
	@section('footer')
	@endsection