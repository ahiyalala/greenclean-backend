$(document).ready(function(){
  $("#confirmEmployee").on('show.bs.modal',function(event){
    var button = $(event.relatedTarget);
    var id = $(button).data('employee-id');
    $("#employee-delete").attr('href','employee/delete/'+id);
  });

  $("#service-updater").on('change',function(){
    var key = $(this).val();
    $.ajax({
      url:"/services/get_specific/"+encodeURIComponent(key),
      success:function(data,status,xhr){
        $("#service-type").val(data['service_type_key']);
        $("#service-price").val(data['service_price']);
        $("#service-duration").val(data['service_duration']);
        $("#service-description").val(data['service_description']);
      }
    })
  });

  $("#delete-yes").on('click',function(){
    $("#deleteForm").submit();
  });
})
