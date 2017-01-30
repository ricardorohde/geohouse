<?php
require_once "admin/inc/conexao.php";

// config de styles
$config = ModelConfig::where("WHERE id=1");
$config = $config[0];

?>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>GEOHOUSE</title>

		<meta property="og:url"           content="http://geohouse.com.br" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="NOME" />
		<meta property="og:description"   content="NOME" />
		<meta property="og:image"         content="http://geohouse.com.br/img/logo.png" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" >

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link href="css/carousel.css" rel="stylesheet">
		<link href="css/estilos.css" rel="stylesheet">

		<link href="inc/js/pickadate/lib/themes/default.css" rel="stylesheet">
		<link href="inc/js/pickadate/lib/themes/default.date.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" >

		<link rel="stylesheet" type="text/css" href="bower_components/slick-carousel/slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="bower_components/slick-carousel/slick/slick-theme.css"/>

		<link href="bower_components/lightbox2/src/css/lightbox.css" rel="stylesheet">

		<!-- set o template -->
		<style>

		.barra_topo {
			background-color: <?=$config->getcor_primaria()?>;
		}
		.base_destaque {
			background-color: <?=$config->getcor_primaria()?>;
		}
		.btn-transparente:hover {
			border: solid 2px <?=$config->getcor_secundaria()?>;
		}
		.btn-transparente2 {
			color: <?=$config->getcor_secundaria()?>;
			border: solid 2px <?=$config->getcor_secundaria()?>;
		}
		.btn-transparente2:hover {
			color: <?=$config->getcor_primaria()?>;
			border: solid 2px <?=$config->getcor_primaria()?>;
		}
		.amarelo{
			color: <?=$config->getcor_secundaria()?>;
		}
		.amarelo_fundo{
			background-color: <?=$config->getcor_secundaria()?>;
		}
		.titulo1{
			color:<?=$config->getcor_primaria()?>;
		}
		.footer2{
			background-color: <?=$config->getcor_primaria()?>;
			color: <?=$config->getcor_secundaria()?>;
		}
		.nav li a {
			color: <?=$config->getcor_primaria()?>;
		}
		.nav li.active a {
			color: <?=$config->getcor_secundaria()?>;
			border-top: solid 3px <?=$config->getcor_secundaria()?>;
		}
		#box_titulo1 {
			background-color: <?=$config->getcor_secundaria()?>;
		}
		</style>

	</head>

	<body>

		<div class="barra_topo">
			<div class="container">
				(19) 0000 0000  |  email@site.com.br
				<a href="admin" target="_blank" class="pull-right">Admin</a>
			</div>
		</div>

		<div class="navbar-wrapper">
			<div class="container">

				<nav class="navbar navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="home">
								<img src="img/logo.png" >
							</a>
						</div>
						<div id="navbar" class="navbar-collapse collapse pull-right">
							<ul class="nav navbar-nav">
								<li <?=($pagina=='home')?' class="active"':''?>><a href="home">Home</a></li>
								<li <?=($pagina=='sobre')?' class="active"':''?>><a href="sobre">Sobre</a></li>
								<li <?=($pagina=='imoveis-aluguel')?' class="active"':''?>><a href="imoveis-aluguel">Aluguel</a></li>
								<li <?=($pagina=='imoveis-venda')?' class="active"':''?>><a href="imoveis-venda">Venda</a></li>
								<li <?=($pagina=='atendimento')?' class="active"':''?>><a href="atendimento">Atendimento</a></li>
							</ul>
						</div>
					</div>
				</nav>

			</div>
		</div>
