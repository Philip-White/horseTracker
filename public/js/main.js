/*
here is where we toggle back and forth between the stats and the health info on the show horse view
*/
$(document).ready(function(){
    $('#health').hide();
    $(".btn1").click(function(){
        $("#health").hide();
        $('#stats').show();
      });
      $(".btn2").click(function(){
        $("#stats").hide();
        $('#health').show();

      });

})