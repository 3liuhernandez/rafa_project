<!DOCTYPE html>
<html lang="es" prefix="og: https://ogp.me/ns#">
<head prefix="home: <?php echo base_url()?>home">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Primary Meta Tags -->
    <title>Proyecto - Principe de paz</title>
    <meta name="title" content="Proyecto - Principe de paz">
    <meta name="description" content="Proyecto - Principe de paz">

    <link rel="stylesheet" href="<?php echo base_url('lib/css/bootstrap.min.css')?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/css/login.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/css/loader_css.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/css/animate.css')?>" />
    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('lib/fontawesome/css/fontawesome.min.css') ?>">
</head>
<body>
<div class="container">
	<div class="">
		<div class="card">
			<div class="card-header">
				<h3>Inicio de Sesión </h3>
				<div class="social_icon">
					<img class="logo" src="<?php echo base_url('lib/img/logoccaa.png') ?>">
				</div>
			</div>
			<div class="card-body">

				<form id="loginform" onsubmit="return validate(event);" class="form">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" class="form-control" placeholder="Correo Electrónico" name="email" id="email">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="contraseña" name="pswd" id="pswd">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Recordarme inicio de sesión
					</div>
					<div class="form-group">
						<input type="submit" id="submit" value="Entrar" class="btn float-right login_btn">
					</div>
				</form>

				<div id="alert" class="my-2 alert alert-danger hidden" role="alert">
					<strong> E-mail Inválido </strong>
				</div>

			</div>
			<div class="card-footer">
				<div class="">
					<a href="#">'¿Olvidó la contraseña'?</a>
				</div>
			</div>
		</div>
	</div>
</div>

	<script src="<?php echo base_url('lib/js/app.js') ?>"></script>
    <script src="<?php echo base_url('lib/js/sweetalert.min.js') ?>"></script>
    <script src="<?php echo base_url('lib/js/jquery-3.2.1.slim.min.js') ?>"></script>
    <script src="<?php echo base_url('lib/js/jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('lib/js/bootstrap.min.js'); ?>" type="text/javascript"></script>

    <script src="<?php echo base_url('lib/js/popper.min.js') ?>"></script>

    <script>
        function validate(e) {
            e.preventDefault();
            let email = document.getElementById("email");
            let pswd = document.getElementById("pswd");
            let submit = document.getElementById("submit");
            let base_url = <?php echo json_encode(base_url()); ?>;

            if (email === " " || pswd === " " ) {
                alert("rellene los campos");

            } else {
                
                $.ajax({
                    url: base_url + 'validate_login',
                    data: {
                        'email': email.value,
                        'pswd': pswd.value
                    },
                    type: 'POST',
                    beforeSend: function(){
                        submit.disabled = true;
                    },
                    success: function(data){
                        respuesta = JSON.parse(data);

                        //console.log(respuesta);

                        if(respuesta.loggin) {
                            window.location = base_url + "user_redirect";
                        }
                        else if(respuesta.email) {

                            $('#alert').removeClass('hidden');
                            submit.disabled = false;
                            setTimeout(function(){
                                $('#alert').addClass('hidden');
                            }, 2000)
                        }else {

                            console.log(respuesta);
                        }
                    },
                    error: function(){
                        console.log('error filesystem: ' + base_url);
                        /* window.location = base_url + "login"; */
                    }
                })
            }
            return false;
        }
    </script>
</body>
</html>
