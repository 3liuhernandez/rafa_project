<?php $this->load->view('layout/admin/app_admin'); ?>

<div class="col-lg-12">
    <h1 class="page-header">Usuarios normales</h1>

    <div class="btn-group">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar nuevo</button>
    </div>
</div>
<?php
    $usuarios = array(
        (object) [
            'id' => 1,
            'email' => '3liuhernandez@gmail.com',
            'position' => 'administrador',
            'last_name' => 'hernandez',
        ],
        (object) [
            'id' => 2,
            'email' => 'josue@gmail.com',
            'position' => 'lider',
            'last_name' => 'Ayala',
        ],
        (object) [
            'id' => 3,
            'email' => 'dairo@gmail.com',
            'position' => 'pastor',
            'last_name' => 'Ayala',
        ],
    );

?>

<!-- CONTAINER SECCION PAGE -->
<div class="container">
    <table class="table" id="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <!-- <th>Apellido</th> -->
                <th>Cargo</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $user) { ?>
                <tr>
                    <td> <?php echo $user->email ?> </td>
                    <td> <?php echo $user->position ?> </td>
                    <td> <button class="btn btn-warning"> editar </button>
                    <td> <button class="btn btn-danger"> Eliminar </button>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('layout/admin/footer_admin'); ?>


 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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