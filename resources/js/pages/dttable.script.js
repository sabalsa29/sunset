$(document).ready(function () {
    
     
    $('#dttable').DataTable({
        "language": {
            "lengthMenu": "Mostar _MENU_ registros por página",
            "zeroRecords": "Sin datos",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin Registros",
            "infoFiltered": "(se filtraron  _MAX_ registros)",
            "sSearch":         "Buscar:",
            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
        }
    });

})