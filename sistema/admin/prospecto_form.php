<?

require_once "inc/conexao.php";

$objeto = new Prospecto;

if($acao == "editar"){
	$id 		= $_GET['id'];
	$objeto 	= ModelProspecto::where("WHERE id = '$id' LIMIT 1");
	$objeto 	= $objeto[0];

	if(isset($_GET['subacao'])){
		$objeto->setnome($_POST['txtnome']);
		$objeto->setemail($_POST['txtemail']);
		$objeto->settelefone($_POST['txttelefone']);
		$objeto->setcidade($_POST['txtcidade']);
		$objeto->setacesso($_POST['txtacesso']);

		$update = ModelProspecto::update($objeto);

		if($update){
			header("location: prospecto.php?resultado=1");
			exit();
		}else{
			header("location: prospecto.php?resultado=0");
			exit();
		}

	}
}

if($acao == "incluir"){
	$objeto = new Prospecto;
	$objeto->setnome($_POST['txtnome']);
	$objeto->setemail($_POST['txtemail']);
	$objeto->settelefone($_POST['txttelefone']);
	$objeto->setcidade($_POST['txtcidade']);
	$objeto->setacesso($_POST['txtacesso']);

	$inserir = ModelProspecto::inserir($objeto);
	if($inserir){
		header("location: prospecto.php?resultado=1");
		exit();
	}else{
		header("location: prospecto.php?resultado=0");
		exit();
	}

}

?>
<? include("inc/header.php"); ?>
<div class="container">
	<div class="panel">
		<form method="post" action="<?=($acao=='editar')?'?acao=editar&subacao=update&id='.$id:'?acao=incluir'?>" name="form">
			<div class="panel-body">
				<a href="prospecto.php" class="btn btn-default pull-right">Voltar</a>
				<h1>Prospeto Cliente</h1>

				<div class="row">
					<div class="form-group col-md-12">
						<label>Nome</label>
						<input type="text" name="txtnome" class="form-control" value="<?=$objeto->getnome()?>">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<label>E-mail</label>
						<input type="text" name="txtemail" class="form-control" value="<?=$objeto->getemail()?>">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label>Telefone</label>
						<input type="text" name="txttelefone" class="form-control" value="<?=$objeto->gettelefone()?>">
					</div>

					<div class="form-group col-md-6">
						<label>Cidade</label>
						<input type="text" name="txtcidade" class="form-control" value="<?=$objeto->getcidade()?>">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<label>Último acesso</label>
						<input type="text" name="txtacesso" class="form-control" value="<?=$objeto->getacesso()?>">
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
