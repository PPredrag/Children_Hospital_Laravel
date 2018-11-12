   $(function(){
    $('#daa').hide();
    $('#kukovi').change(function(){
      var vrednost = $(this).val();
     
      if(vrednost =='Nisu_Snimani' ){
        $('#daa').hide();
      }
      else{
        $('#' + $(this).val()).show();
      }
      });

  });