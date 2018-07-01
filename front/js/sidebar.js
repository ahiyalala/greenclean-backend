// $("#menu-toggle").click(function (e) {
//   e.preventDefault();
//   $("#wrapper").toggleClass("toggled");
// });

// let side ="close"; 
// jQuery('#menu-toggle').bind('click mouseover', function (e) {
  
//   e.preventDefault();
//       $("#wrapper").toggleClass("toggled");
//       if (side == "close"){
//         return side = "open";
//       }else{
//         return side = "close"; 
//       }
// });

// $(window).scroll(function(e){
//       if ($(document).scrollTop() > 0 && side == "open"){
//         side ="close"
//       e.preventDefault();
//       $("#wrapper").toggleClass("toggled");
      
//       }
// });
// window.setTimeout(function() {
//     $(".alert").fadeTo(500, 0).slideUp(500, function(){
//         $(this).remove(); 
//     });
// }, 4000);

 let side ="close"; 
 let number = 0;
 console.log(side + ": " + ++number);
$(window).scroll(function(e){
      if ($(document).scrollTop() > 0 && side == "open"){
        console.log(side + ": " + ++number);
        return side ="close"

      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
      
       }
});



$("#menu-toggle").click(function (e) {
  return side ="open"; 
  console.log(side + ": " + ++number);
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
window.setTimeout(function() {
$(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
});
}, 4000);


