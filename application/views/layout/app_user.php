<!DOCTYPE html>
<html lang="es" prefix="og: https://ogp.me/ns#">
<head prefix="home: <?php echo base_url()?>home">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Primary Meta Tags -->
    <title>ADMIN</title>
    <meta name="title" content="ADMIN">
    <meta name="description" content="ADMIN">

    <link rel="stylesheet" href="<?php echo base_url()?>lib/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>lib/css/login.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>lib/css/animate.css" />
</head>
<body>
    <div class="container">
        <h1> USER </h1>
    </div>

    <div id="modal_spinner" class="w3-modal w3-display-container">
        <strong class="w3-text-white w3-xxlarge w3-margin-top w3-display-middle w3-center">
            Hagios I.F.I <b class="fa fa-spinner fa-spin w3-xxxlarge"></b>
        </strong>
        <p class="w3-medium w3-text-white w3-margin-top w3-display-bottommiddle">
            [Si la pantalla persiste por más de 3 minutos: recargue la página]
        </p>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {});
    </script>

    <script>
        $(document).ready(function(){
        
            $('.data-table').DataTable({
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
</body>
</html>