@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <h3 class="inline"><p class="naslov">Dobro Došli &nbsp{{ Auth::user()->name }}, klikom na dugme"Obriš" uklonite upisanu naplatu</p></h3><br><br>
            @if(session('success'))
            <p class="zeleno" id="sakri">{{session('success')}}</strong>
                @endif
                @if(count($data)>0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Pregled</th>
                            <th>Kraj Pregleda</th>
                            <th>Potvrda</th>
                            <th>Vakcina</th>
                            <th>Rane</th>
                            <th>Sistematski</th>
                            <th>Pacijent</th>
                            <th>Doktor</th>
                            <th>Vreme</th>
                            <th>Obrisati</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($data as $da)
                        <tr>
                            <td>{{ $da->pregled }},00 din</td>
                            <td>{{ $da->krajPregled}},00 din</td>
                            <td>{{ $da->potvrda }},00 din</td>
                            <td>{{ $da->vakcina }},00 din</td>
                            <td>{{ $da->rane }},00 din</td>
                            <td>{{ $da->sistematski }},00 din</td>
                            <td>{{ $da->ime }} {{ $da->prezime}} {{ $da->imeroditelja}}</td>
                            <td>{{ $da->name}}</td>
                            <td>{{date('d-m-Y H:i:s', strtotime($da->created_at))}}</td>
                            <td>
                                <a href="{{ url('obrisiJednuZaradu/'.$da->id)}}"><button type="button" class="btn btn-danger">Obriši Naplatu</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
                @else
                <p class="crveno"><b>Nema Evidentiranih Zarada</b></p>
                @endif
            </div>
        </div>
    </div>
    @endsection
    @section('footer')
    <script type="text/javascript" src="{{ asset('javaScript/sakri.js') }}"></script>
    @endsection