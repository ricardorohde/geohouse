<?

require_once "inc/conexao.php";

$objeto = new TipoImovel;

if($acao == "editar"){
	$id 		= $_GET['id'];
	$objeto 	= ModelTipo::where("WHERE id = '$id' LIMIT 1");
	$objeto 	= $objeto[0];

	if(isset($_GET['subacao'])){
		$objeto->setnome($_POST['txtnome']);

		$update = ModelTipo::update($objeto);

		if($update){
			header("location: tipo_imovel.php?resultado=1");
			exit();
		}else{
			header("location: tipo_imovel.php?resultado=0");
			exit();
		}
		
	}
}

if($acao == "incluir"){
	$objeto = new TipoImovel;
	$objeto->setnome($_POST['txtnome']);
	
	$inserir = ModelTipo::inserir($objeto);
	if($inserir){
		header("location: tipo_imovel.php?resultado=1");
		exit();
	}else{
		header("location: tipo_imovel.php?resultado=0");
		exit();
	}

}

?>
<? include("inc/header.php"); ?>
<div class="container">
	<div class="panel">
		<form method="post" action="<?=($acao=='editar')?'?acao=editar&subacao=update&id='.$id:'?acao=incluir'?>" name="form">
			<div class="panel-body">
				<a href="tipo_imovel.php" class="btn btn-default pull-right">Voltar</a>
				<h1>Tipo do imóvel</h1>

				<div class="row">
					<div class="form-group col-md-12">
						<label>Nome do tipo</label>
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