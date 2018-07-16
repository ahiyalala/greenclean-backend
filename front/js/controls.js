$(document).ready(function(){
  $("#confirmEmployee").on('show.bs.modal',function(event){
    var button = $(event.relatedTarget);
    var id = $(button).data('employee-id');
    $("#employee-delete").attr('href','employee/delete/'+id);
  });
})
