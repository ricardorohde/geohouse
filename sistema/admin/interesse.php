<?
require_once 'inc/conexao.php';

$id_prospecto = $_GET['id'];

if($acao=="remover"){
	if(ModelInteresse::delete($_GET['id'])){
		header("location: interesse.php?resultado=1");
		exit();
	}else{
		header("location: interesse.php?resultado=0");
		exit();
	}
}
?>
<? include("inc/header.php"); ?>

<div class="container panel">
	<div class="panel-body">
	<h1>Interesses do prospecto cliente</h1>

	<table class="table table-striped">
	<?
	foreach(ModelInteresse::where('WHERE id_prospecto = '.$id_prospecto) as $val){
		echo '<tr>';
		echo '<td>'.$val->getchave().'</td>';
		echo '<td>'.$val->getvalor().'</td>';
		echo '<td>
			<a href="?acao=remover&id='.$val->getid().'" class="btn btn-danger"><i class="fa fa-times"></i></a>
			</td>';
		echo '</tr>';
	}
	?>
	</table>

	</div>
</div>

<? include("inc/footer.php"); ?>
