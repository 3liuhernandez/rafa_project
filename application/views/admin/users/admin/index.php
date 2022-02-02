<?php $this->load->view('layout/admin/app_admin'); ?>

<div class="col-lg-12">
    <h1 class="page-header">Usuarios Administradores</h1>

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
<div class="container-fluid">
    <table class="table" id="table_users">
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
                    <td class="text-uppercase member_email">  <?php echo $user->email ?> </td>
                    <td class="text-uppercase member_name">   <?php echo $user->position ?> </td>
                    <td class="text-uppercase member_edit">   <button class="btn btn-warning"> editar </button>
                    <td class="text-uppercase member_delete"> <button class="btn btn-danger" onclick="delete_user( <?php echo $user->id; ?> )"> Eliminar </button>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
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
        $('#table_users').DataTable({
            responsive: true,
            scrollx: true,
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
                "sSearch": "Filtrar por:",
                "oPaginate": {
                    "sPrevious": "<i class='btn fa fa-arrow-left'> </i>",
                    "sNext": "<i class='btn fa fa-arrow-right'> </i>"
                },
                "sLengthMenu": "Mostrar _MENU_ registros"
            }
        });
    })
</script>