@extends('layouts.app')
        @section('content')
<div class="container">
            <div class="panel panel-default">
                <div class="panel-heading" id="pocetak">Pretraži ili Registruj novog Pacijenta</div>
                <div class="panel-body">
                           <form class="navbar-form navbar-left" action="{{ route('find') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Pretrazi Pacijenta">
                        <span class="input-group-btn">
                        </span>
                    </div>
                </form>  
                   <a href="{{route('registracijaPacijenta')}}"><button type="submit" class="btn btn-primary" id="desno">Registruj Pacijenta</button></a>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
        <div id="result" style="display:none">
    <ul style="margin-top:10px; list-style-type:none; padding: 0;" id="memList"></ul>
            </div>  
        </div>   
<img src="{{asset('images/trazi2.jpg')}}" alt="Novi Pacijent" class="slika">
@endsection
@section('footer')   
<script type="text/javascript">
    
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        $('#search').keyup(function(){ 
            var search = $('#search').val(); 
            if(search==""){
                $("#memList").html();
                $('#result').hide();
                $('.slika').show();
            }
            else{
                $.get("{{ route('search') }}",
                    {search:search}, 
                    function(data){
                    $('#memList').empty().html(data);
                    $('.slika').hide();
                    $('#result').show();
                })
            }
        });
        $('#search').click(function(){
            $('#search').css("width", "300px");
        });
    });


</script>
@endsection

