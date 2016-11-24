<?

require_once "inc/conexao.php";

$objeto = new Cidade;

if($acao == "editar"){
	$id 		= $_GET['id'];
	$objeto 	= ModelCidade::where("WHERE id = '$id' LIMIT 1");
	$objeto 	= $objeto[0];

	if(isset($_GET['subacao'])){
		$objeto->setnome($_POST['txtnome']);

		$update = ModelCidade::update($objeto);

		if($update){
			header("location: cidade.php?resultado=1");
			exit();
		}else{
			header("location: cidade.php?resultado=0");
			exit();
		}
		
	}
}

if($acao == "incluir"){
	$objeto = new Cidade;
	$objeto->setnome($_POST['txtnome']);
	
	$inserir = ModelCidade::inserir($objeto);
	if($inserir){
		header("location: cidade.php?resultado=1");
		exit();
	}else{
		header("location: cidade.php?resultado=0");
		exit();
	}

}

?>
<? include("inc/header.php"); ?>
<div class="container">
	<div class="panel">
		<form method="post" action="<?=($acao=='editar')?'?acao=editar&subacao=update&id='.$id:'?acao=incluir'?>" name="form">
			<div class="panel-body">
				<a href="cidade.php" class="btn btn-default pull-right">Voltar</a>
				<h1>Cidades</h1>

				<div class="row">
					<div class="form-group col-md-12">
						<label>Cidade / UF</label>
						<input type="text" name="txtnome" class="form-control" value="<?=$objeto->getnome()?>">
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