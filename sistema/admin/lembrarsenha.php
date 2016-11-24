
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>ADMIN</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" >


		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="estilos.css" >

		<style>
			.containter {
			  position: relative;
			  height: 100%;
			  background-color: #333;
			}

			.box-centro {
			  top: 50%;
			  position: absolute;
			  transform: translateY(-50%);
			}
		</style>
	</head>

	<body>

		<div class="containter">
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-offset-4 box-centro">

					<div class="panel panel-default ">
						<div class="panel-body text-center">

							<form method="post" action="login.php?acao=autenticar" name="frmlogin">
								<div class="form-group">
									<label>E-mail</label>
									<input type="text" class="form-control" name="txtemail" required>
								</div>

								<div class='form-group'>
									<input type='submit' name="btenviar" class="btn btn-info" value="Enviar minha senha">
								</div>
								<?
								if(isset($_GET['erro'])){
									echo '<div class="alert alert-warning">';
									switch($_GET['erro']){
										case '1':
											echo 'Problemas na autenticação. Tente novamente.';
											break;
										case '2':
											echo 'Você saiu com segurança do sistema.';
											break;
										case '3':
											echo 'Faça seu login para entrar.';
											break;
									}
									echo '</div>';
								}
								?>
								?>
							</form>

							<a href="cadastro.php">Não possuo cadastro</a> |
							<a href="lembrarsenha.php">Esqueci minha senha</a>

						</div>
					</div>

				</div>
			</div>
		</div>

	</body>

</html>
