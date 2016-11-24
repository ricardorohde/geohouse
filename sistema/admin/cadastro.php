<?
require_once "inc/conexao.php";

if($acao == "incluir"){
	$objeto = new Usuario;
	$objeto->setnome($_POST['txtnome']);
	$objeto->setemail($_POST['txtemail']);
	$objeto->setsenha($_POST['txtsenha']);
	$objeto->setsite($_POST['txtsite']);
	$objeto->setbiografia($_POST['txtbiografia']);
	$objeto->settelefone($_POST['txttelefone']);
	$objeto->setfoto($_POST['txtfoto']);
	$objeto->setperfil(1);

	$inserir = ModelUsuario::inserir($objeto);
	if($inserir){
		header("location: index.php?resultado=1");
		exit();
	}else{
		header("location: index.php?resultado=0");
		exit();
	}

}
?>
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

						<form method="post" action="?acao=incluir" name="form">

								<h1>Cadastre-se</h1>

								<div class="row">
									<div class="form-group">
										<label>Nome</label>
										<input type="text" name="txtnome" class="form-control" >
									</div>
									<div class="form-group">
										<label>E-mail</label>
										<input type="text" name="txtemail" class="form-control" >
									</div>
									<div class="form-group">
										<label>Senha</label>
										<input type="password" name="txtsenha" class="form-control" value="">
									</div>
									<div class="form-group">
										<label>Repetir senha</label>
										<input type="password" name="txtsenha2" class="form-control" value="">
									</div>

									<div class="form-group">
										<label>Site</label>
										<input type="text" name="txtsite" class="form-control" value="" placeholder="http://www...">
									</div>
									<div class="form-group">
										<label>Sobre</label>
										<textarea name="txtbiografia" class="form-control"></textarea>
									</div>
									<div class="form-group">
										<label>Telefone</label>
										<input type="text" name="txttelefone" class="form-control" value="" placeholder="(00) 0...">
									</div>
									<div class="form-group">
										<label>Foto</label>
										<input type="file" name="txtfoto" class="form-control" value="">
									</div>
								</div>

						</form>

							<a href="entrar.php">Já possuo cadastro</a> |
							<a href="#">Esqueci minha senha</a>

						</div>
					</div>

				</div>
			</div>
		</div>

	</body>

</html>
