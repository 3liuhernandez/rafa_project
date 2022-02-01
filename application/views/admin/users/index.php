<?php $this->load->view('layout/admin/app_admin'); ?>

<h1> contenido usuarios</h1>

<?php $this->load->view('layout/admin/footer_admin'); ?>

<script>
    $(document).ready( function() {
        $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: ['excel'],
            responsive: true,
            /* scrollx: true, */
            "oLanguage": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sPrevious": "<",
                    "sNext": ">"
                },
                "sLengthMenu": "Mostrar _MENU_ registros"
            }
        });
    })
</script>