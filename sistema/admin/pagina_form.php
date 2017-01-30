<?

require_once "inc/conexao.php";

$objeto = new Pagina;

if($acao == "editar"){
	$id 		= $_GET['id'];
	$objeto 	= ModelPagina::where("WHERE id = '$id' LIMIT 1");
	$objeto 	= $objeto[0];

	if(isset($_GET['subacao'])){
		$objeto->settitulo($_POST['txttitulo']);
		$objeto->settexto($_POST['txttexto']);

		$update = ModelPagina::update($objeto);

		if($update){
			header("location: pagina.php?resultado=1");
			exit();
		}else{
			header("location: pagina.php?resultado=0");
			exit();
		}

	}
}

if($acao == "incluir"){
	$objeto = new Pagina;
	$objeto->settitulo($_POST['txttitulo']);
	$objeto->settexto($_POST['txttexto']);

	$inserir = ModelPagina::inserir($objeto);
	if($inserir){
		header("location: pagina.php?resultado=1");
		exit();
	}else{
		header("location: pagina.php?resultado=0");
		exit();
	}

}

?>
<? include("inc/header.php"); ?>
<div class="container">
	<div class="panel">
		<form method="post" action="<?=($acao=='editar')?'?acao=editar&subacao=update&id='.$id:'?acao=incluir'?>" name="form">
			<div class="panel-body">
				<a href="pagina.php" class="btn btn-default pull-right">Voltar</a>
				<h1>Página estática</h1>

				<div class="row">
					<div class="form-group col-md-12">
						<label>Título</label>
						<input type="text" name="txttitulo" class="form-control" value="<?=$objeto->gettitulo()?>">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<label>Conteúdo</label>
						<textarea name="txttexto" class="form-control summernote"><?=$objeto->gettexto()?></textarea>
					</div>
				</div>


			</div>
		</form>
		<div class="panel-footer">
			<a href="javascript: void()" onclick="form.submit();" class='btn btn-success'>Concluir</a>
		</div>

	</div>
</div>

<? include("inc/footer.php"); ?>
