$(document).ready(function() {
    $('#myTable,#myTable2').DataTable();
    $('#appointments-table').DataTable(
      {
        "order":[[4,"asc"]]
      }
    );
} );
