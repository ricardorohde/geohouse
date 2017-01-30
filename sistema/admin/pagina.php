<?
require_once 'inc/conexao.php';

if($acao=="remover"){
	if(ModelPagina::delete($_GET['id'])){
		header("location: pagina.php?resultado=1");
		exit();
	}else{
		header("location: pagina.php?resultado=0");
		exit();
	}
}
?>
<? include("inc/header.php"); ?>

<div class="container panel">
	<div class="panel-body">
	<a href="pagina_form.php?acao=novo" class="btn btn-success pull-right"><i class="fa fa-plus"></i></a>
	<h1>Páginas estatáticas</h1>

	<table class="table table-striped">
	<?
	foreach(ModelPagina::where('') as $val){
		echo '<tr>';
		echo '<td>'.$val->gettitulo().'</td>';
		echo '<td>
			<a href="?acao=remover&id='.$val->getid().'" class="btn btn-danger"><i class="fa fa-times"></i></a>
			<a href="pagina_form.php?acao=editar&id='.$val->getid().'" class="btn btn-info"><i class="fa fa-pencil"></i></a>
			</td>';
		echo '</tr>';
	}
	?>
	</table>

	</div>
</div>

<? include("inc/footer.php"); ?>
