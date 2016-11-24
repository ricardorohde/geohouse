<?
require_once 'inc/conexao.php';

$hash = $_GET['hash'];


include("inc/header.php");

?>
<div class="container">
	<div class="row" style="margin-bottom:20px;">
		<div class="col-md-12">
			<a href="imoveis.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
			<h1 class="pull-right">Gerar Tag GeoHouse</h1>
		</div>
	</div>
</div>

<div class="container panel">
	<div class="panel-body">

		<img src="gerar_placa/index.php?hash=<?=$hash?>" />

	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<a href="imprimir" class="btn btn-default btn-lg"><i class="fa fa-print"></i> imprimir</a>
		</div>
		<div class="col-md-3">
			<a href="imprimir" class="btn btn-default btn-lg"><i class="fa fa-save"></i> salvar</a>
		</div>
		<div class="col-md-3">
			<a href="imprimir" class="btn btn-default btn-lg"><i class="fa fa-facebook"></i> compartilhar</a>
		</div>
		<div class="col-md-3">
			<a href="imprimir" class="btn btn-default btn-lg"><i class="fa fa-eye"></i> ver imovel</a>
		</div>
	</div>
</div>

<? include("inc/footer.php"); ?>
