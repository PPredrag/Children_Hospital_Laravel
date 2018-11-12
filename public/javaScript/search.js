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
            }
            else{
                $.get("{{ route('search') }}",
                    {search:search}, 
                    function(data){
                    $('#memList').empty().html(data);
                    $('#result').show();
                })
            }
        });
        $('#search').click(function(){
            $('#search').css("width", "300px");
        });
    });