<?

require_once "inc/conexao.php";


if($acao == "incluir"){
	$objeto = new Categoria;
	$objeto->setnome($_POST['txtnome']);
	$objeto->setativo($_POST['txtativo']);
	
	$inserir = ModelCategoria::inserir($objeto);
	if($inserir){
		header("location: categoria.php?resultado=1");
		exit();
	}else{
		header("location: categoria.php?resultado=0");
		exit();
	}

}

?>
<? include("inc/header.php"); ?>
<div class="container">
	<div class="panel">
		<form method="post" action="?acao=incluir" name="form">
			<div class="panel-body">
				<a href="categoria.php" class="btn btn-default pull-right">Voltar</a>
				<h1>Categorias</h1>

				<div class="row">
					<div class="form-group col-md-8">
						<label>nome</label>
						<input type="text" name="txtnome" class="form-control">
					</div>
					<div class="form-group col-md-12">
						<label>ativo</label>
						<select name="txtativo">
						<option value="1">Sim</option>
						<option value="0">Não</option>
						</select>
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