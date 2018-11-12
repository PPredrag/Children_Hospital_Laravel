@extends('layouts.app')
@section('content')
<h3 class="inline"><p class="naslov">Spisak Primljenih Vakcina</p></h3>
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
  @if(count($data)>0)
  <table class="table table-striped">
    <a href="{{route('vakcinisanje')}}"> <p class="zeleno">DA BISTE PROMENILI STATUS MORATE TO URADITI U DELU "NOVI PREGLED " ILI KLIKNITE OVDE  </p> </a>
    
    @foreach ($data as $da)
    <table  class="table table-striped">
      <thead>
        <tr>
          <th>Uzrast</th>
          <th id="sredrina">BCG</th>
          <th id="sredrina">HB</th>
          <th id="sredrina">DTP</th>
          <th id="sredrina">OPV</th>
          <th id="sredrina">MMR</th>
          <th id="sredrina">Hib</th>
          <th id="sredrina">DT</th>
          <th id="sredrina">dT</th>
        </tr>
      </thead>
      <tbody id="sredrina">
        <tr>
          <th>Po Rodjenju</th>
          <td>
            
          <button type="button" class="btn {{($da->bcg == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp&nbsp B &nbsp&nbsp&nbsp&nbsp&nbsp</button></td>
          <!--HB--><td>
        <button type="submit" class="btn {{($da->hbprva == 0) ? 'btn-danger' : 'btn-success'}}">&nbspPrva Doza&nbsp</button></td>
        
        <!--DTP--><td></td>
        <!--OPV--><td></td>
        <!--MMR--><td></td>
        <!--Hib--><td></td>
        <!--DT--><td></td>
        <!--dT--><td></td>
      </tr>
      <tr>
        <th>Drugi Mesec</th>
        <td></td>
        <td>
          <button type="submit" class="btn {{($da->hbdruga == 0) ? 'btn-danger' : 'btn-success'}}">Druga Doza
        </button></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>Treći Mesec</th>
        <td></td>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->dtpprva == 0) ? 'btn-danger' : 'btn-success'}}">&nbspPrva Doza&nbsp</button></td>
        <td>
        <button type="submit" class="btn {{($da->opvprva == 0) ? 'btn-danger' : 'btn-success'}}">&nbspPrva Doza&nbsp</button></td>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->hibprva == 0) ? 'btn-danger' : 'btn-success'}}">&nbspPrva Doza&nbsp</button></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>Četvrti Mesec</th>
        <td></td>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->dtpdruga == 0) ? 'btn-danger' : 'btn-success'}}">Druga Doza</button></td>
        <td>
        <button type="submit" class="btn {{($da->opvdruga == 0) ? 'btn-danger' : 'btn-success'}}">Druga Doza</button></td>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->hibdruga == 0) ? 'btn-danger' : 'btn-success'}}">Druga Doza</button></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>Šesti Mesec</th>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->hbtreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></td>
        <td>
        <button type="submit" class="btn {{($da->dtptreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></td>
        <td>
        <button type="submit" class="btn {{($da->opvtreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></td>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->hibtreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>12-15 Mesec</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->mmrb == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp&nbsp B &nbsp&nbsp&nbsp&nbsp&nbsp</button></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>17-24 Mesec</th>
        <td></td>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->dtpp1 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P1 &nbsp&nbsp&nbsp&nbsp&nbsp</button></td>
        <td>
        <button type="submit" class="btn {{($da->opvp1 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P1 &nbsp&nbsp&nbsp&nbsp&nbsp</button></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>7 Godina</th>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->opvp2 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P2 &nbsp&nbsp&nbsp&nbsp&nbsp</button></td>
        <td>
        <button type="submit" class="btn {{($da->mmrp == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp&nbsp P &nbsp&nbsp&nbsp&nbsp&nbsp</button></td>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->dtp2 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P2 &nbsp&nbsp&nbsp&nbsp&nbsp</button></td>
        <td></td>
      </tr>
      <tr>
        <th>12 Godina</th>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->hbtridoze == 0) ? 'btn-danger' : 'btn-success'}}">Tri Doze(0,1,6)</button></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>14 Godina</th>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->opvp3 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P3 &nbsp&nbsp&nbsp&nbsp&nbsp</button></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <button type="submit" class="btn {{($da->dtp3 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P3 &nbsp&nbsp&nbsp&nbsp&nbsp</button></td>
      </tr>
    </tbody>
  </table>
  @endforeach
</div>
</div>
@else
<p class="crveno"><b>PACIJENT SA OVIM PODACIMA NEMA EVIDENCIJU VAKCINISANJA</b></p>
@endif
@endsection
@section('footer')
<script>
$(document).ready(function(){
  $('.zeleno').hide();
      $('.btn-success ,.btn-danger').on('click',function(){
   $('.zeleno').show();
  });
});
</script>
@endsection