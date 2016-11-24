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
