<?

require_once "inc/conexao.php";

$objeto = new Usuario;

if($acao == "editar"){
	$id 		= $_GET['id'];
	$objeto 	= ModelUsuario::where("WHERE id = '$id' LIMIT 1");
	$objeto 	= $objeto[0];

	if(isset($_GET['subacao'])){
		$objeto->setnome($_POST['txtnome']);
		$objeto->setemail($_POST['txtemail']);
		if($_POST['txtsenha']!=''){
			$objeto->setsenha(md5($_POST['txtsenha']));	
		}
		$objeto->setperfil(1);

		$update = ModelUsuario::update($objeto);

		if($update){
			header("location: usuario.php?resultado=1");
			exit();
		}else{
			header("location: usuario.php?resultado=0");
			exit();
		}
		
	}
}

if($acao == "incluir"){
	$objeto = new Usuario;
	$objeto->setnome($_POST['txtnome']);
	$objeto->setemail($_POST['txtemail']);
	$objeto->setsenha($_POST['txtsenha']);
	$objeto->setperfil(1);
	
	$inserir = ModelUsuario::inserir($objeto);
	if($inserir){
		header("location: usuario.php?resultado=1");
		exit();
	}else{
		header("location: usuario.php?resultado=0");
		exit();
	}

}

?>
<? include("inc/header.php"); ?>
<div class="container">
	<div class="panel">
		<form method="post" action="<?=($acao=='editar')?'?acao=editar&subacao=update&id='.$id:'?acao=incluir'?>" name="form">
			<div class="panel-body">
				<a href="usuario.php" class="btn btn-default pull-right">Voltar</a>
				<h1>Usuários</h1>

				<div class="row">
					<div class="form-group col-md-4">
						<label>Nome</label>
						<input type="text" name="txtnome" class="form-control" value="<?=$objeto->getnome()?>">
					</div>
					<div class="form-group col-md-4">
						<label>E-mail</label>
						<input type="text" name="txtemail" class="form-control" value="<?=$objeto->getemail()?>">
					</div>
					<div class="form-group col-md-4">
						<label>Senha</label>
						<input type="password" name="txtsenha" class="form-control" value="">
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