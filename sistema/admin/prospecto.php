<?
require_once 'inc/conexao.php';

if($acao=="remover"){
	if(ModelProspecto::delete($_GET['id'])){
		header("location: prospecto.php?resultado=1");
		exit();
	}else{
		header("location: prospecto.php?resultado=0");
		exit();
	}
}
?>
<? include("inc/header.php"); ?>

<div class="container panel">
	<div class="panel-body">
	<a href="prospecto_form.php?acao=novo" class="btn btn-success pull-right"><i class="fa fa-plus"></i></a>
	<h1>Prospectos Clientes</h1>

	<table class="table table-striped">
	<?
	foreach(ModelProspecto::where('') as $val){
		echo '<tr>';
		echo '<td>'.$val->getnome().'</td>';
		echo '<td>'.$val->getacesso().'</td>';
		echo '<td><a href="interesse.php?id='.$val->getid().'">Interesse</a></td>';
		echo '<td>
			<a href="?acao=remover&id='.$val->getid().'" class="btn btn-danger"><i class="fa fa-times"></i></a>
			<a href="prospecto_form.php?acao=editar&id='.$val->getid().'" class="btn btn-info"><i class="fa fa-pencil"></i></a>
			</td>';
		echo '</tr>';
	}
	?>
	</table>

	</div>
</div>

<? include("inc/footer.php"); ?>
