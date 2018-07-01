 $("#menu-toggle").click(function (e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");
 });

let side ="close"; 
 jQuery('#menu-toggle').bind('click mouseover', function (e) {
  
  e.preventDefault();
      $("#wrapper").toggleClass("toggled");
      if (side == "close"){
        return side = "open";
      }else{
        return side = "close"; 
      }
 });

$(window).scroll(function(e){
      if ($(document).scrollTop() > 0 && side == "open"){
        side ="close"
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
      
      }
});
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);

// $("#menu-toggle").click(function (e) {
//   e.preventDefault();
//   $("#wrapper").toggleClass("toggled");
// });
// window.setTimeout(function() {
// $(".alert").fadeTo(500, 0).slideUp(500, function(){
//     $(this).remove(); 
// });
// }, 4000);
