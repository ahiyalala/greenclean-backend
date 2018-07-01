let side ="close"; 

$(window).scroll(function(e){
      if ($(document).scrollTop() > 0 && side == "open"){
        side ="close"
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");   
       }
});

$("#menu-toggle").click(function (e) {
   if (side == "close"){
    side ="open"; 
   }else{
     side ="close";
   }
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});


window.setTimeout(function() {
$(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
});
}, 4000);


