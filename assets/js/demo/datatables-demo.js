// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTableEmpleado').DataTable( {
      "language": {
  "sProcessing":     "Procesando...",
  "sLengthMenu":     "Mostrar _MENU_ empleados",
  "sZeroRecords":    "No se encontraron resultados",
  "sEmptyTable":     "Ningún dato disponible en esta tabla",
  "sInfo":           "Mostrando  _START_ a _END_ empleados de un total de _TOTAL_ empleados",
  "sInfoEmpty":      "Sin empleados que mostrar",
  "sInfoFiltered":   "(filtrado de un total de _MAX_ empleados)",
  "sInfoPostFix":    "",
  "sSearch":         "Buscar:",
  "sUrl":            "",
  "sInfoThousands":  ",",
  "sLoadingRecords": "Cargando...",
  "oPaginate": {
    "sFirst":    "<i class='fas fa-angle-double-left'></i>",
    "sLast":     "<i class='fas fa-angle-double-right'></i>",
    "sNext":     "<i class='fas fa-angle-right'></i>",
    "sPrevious": "<i class='fas fa-angle-left'></i>"
  },
  "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  },
  "buttons": {
      "copy": "Copiar",
      "colvis": "Visibilidad"
  }
}
  } );
} );
