  $(function(){
  var vreme = 3000;
  $('#napomena').hide();
  $('#klik').mouseenter(function(){
      $('#napomena').show();
      $('#evidencija').css("background-color","#d9534f");
      $('#evidencija').css("width","300px");
      $('#evidencija').css("border-color","#d9534f");
   });

   $('#klik').mouseleave(function(){
       $("#napomena").delay(5000).hide(200);
   });
 $('#unos').on('keypress', function(){
    setTimeout(function(){
      $('#klik').css("background-color","#d9534f");
      $('#klik').css("width","190px");
      $('#klik').css("height","33px");
      $('#klik').css("border-color","#d9534f");
      
    },vreme);
 });

});;