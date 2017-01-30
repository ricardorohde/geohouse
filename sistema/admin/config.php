<?

require_once "inc/conexao.php";

$objeto 	= ModelConfig::where("WHERE id = '1' LIMIT 1");
$objeto 	= $objeto[0];

if(isset($_GET['subacao'])){
	$objeto->setnome_loja($_POST['txtnome_loja']);
	$objeto->setcor_primaria($_POST['txtcor_primaria']);
	$objeto->setcor_secundaria($_POST['txtcor_secundaria']);

	$imagem = '';

	if($_FILES['txtlogo']['name'] != ""){
			$imagem = SobeImagem($_FILES['txtlogo']['name'], $_FILES['txtlogo']['tmp_name'], '../img/config/');
	}

	$objeto->setlogo($imagem);

	$update = ModelConfig::update($objeto);

	if($update){
		header("location: config.php?resultado=1");
		exit();
	}else{
		header("location: config.php?resultado=0");
		exit();
	}

}

?>
<? include("inc/header.php"); ?>
<div class="container">
	<div class="panel">
		<form method="post" action="?acao=editar&subacao=update&id=1" name="form">
			<div class="panel-body">
				<a href="index.php" class="btn btn-default pull-right">Voltar</a>
				<h1>Configurações</h1>

				<div class="row">
					<div class="form-group col-md-12">
						<label>Nome exibido</label>
						<input type="text" name="txtnome_loja" class="form-control" value="<?=$objeto->getnome_loja()?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label>Cor primaria</label>
						<input type="text" name="txtcor_primaria" class="form-control jscolor" value="<?=$objeto->getcor_primaria()?>">
					</div>

					<div class="form-group col-md-4">
						<label>Cor secundaria</label>
						<input type="text" name="txtcor_secundaria" class="form-control jscolor" value="<?=$objeto->getcor_secundaria()?>">
					</div>

					<div class="form-group col-md-4">
						<label>Logo</label>
						<input type="file" name="txtlogo" class="form-control">
						<small>JPEG, PNG ou GIF</small
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
