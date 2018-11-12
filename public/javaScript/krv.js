 $(function(){
    $('#da').hide();
    $('#krvnaSlika').change(function(){
      var vrednost = $(this).val();
     
      if(vrednost =='Nije_Radjena' ){
        $('#da').hide();
      }
      else{
        $('#' + $(this).val()).show();
      }
      });

  });