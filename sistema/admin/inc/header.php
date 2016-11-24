<?
session_start();
if($_SESSION['usuario_id'] == '' OR $_SESSION['usuario_nome'] == '' OR $_SESSION['usuario_email'] == '' OR $_SESSION['usuario_perfil'] == ''){
	session_destroy();
	header("location: ".ROOT_URL."/entrar.php?erro=3");
	exit();
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

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="<?=ROOT_URL?>/admin/estilos.css" >

	</head>

	<body>

		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="<?=ROOT_URL?>/img/logo_negativo.png" width="120px"></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<!--<li><a href="imoveis.php" >Imóveis</a></li>-->
						<!--<li><a href="categoria.php" >Categorias</a></li>-->
						<!--<li><a href="finalidade.php" >Finalidades</a></li>-->
						<!--<li><a href="tipo_imovel.php" >Tipo imóvel</a></li>-->
						<!--<li><a href="cidade.php" >Cidades</a></li>-->
						<!--<li><a href="usuario.php" >Usuários</a></li>-->

						<li><a href="<?=ROOT_URL?>/admin/login.php?acao=sair" >Olá <?=$_SESSION['usuario_nome']?> (sair)</a></li>
						<li><a href="<?=ROOT_URL?>/admin/usuario.php" >Minha conta</a></li>

					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

		<?
		if(isset($_GET['resultado'])){
			if($_GET['resultado']==1){
				echo '<div class="alert alert-success">Operação realizada com sucesso.</div>';
			}else{
				echo '<div class="alert alert-danger">Problemas na operação. Tente novamente ou contate-nos.</div>';
			}
		}
		?>
