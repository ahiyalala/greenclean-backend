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
 let number=0; 
 console.log("Close: " + number++);

$(window).scroll(function(e){
      if ($(document).scrollTop() > 0 && side == "open"){
        console.log("Close: " + number++);
        return side ="close";
       
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
      
       }
});


$("#menu-toggle").click(function (e) {
  if (side == "close"){
      return side = "open";
      console.log("Open: " + ++number);
  }else{
      return side = "close"; 
      console.log("Close: " + ++number);
  }
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
window.setTimeout(function() {
$(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove(); 
});
}, 4000);


