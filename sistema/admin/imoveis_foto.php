<?
require_once 'inc/conexao.php';

$id_imovel = $_GET['id_imovel'];

if($acao=="remover"){
	if(ModelImovelFoto::delete($_GET['id'])){
		header("location: imoveis_foto.php?id=".$id_imovel."&resultado=1");
		exit();
	}else{
		header("location: imoveis_foto.php?id=".$id_imovel."&resultado=0");
		exit();
	}
}
?>
<? include("inc/header.php"); ?>

<div class="container panel">
	<div class="panel-body">
	<a href="imoveis_foto_form.php?acao=novo&id_imovel=<?=$id_imovel?>" class="btn btn-success pull-right"><i class="fa fa-plus"></i></a>
	<h1>Imóveis Fotos</h1>

	<table class="table table-striped">
		<?
		$fotos 	= ModelImovelFoto::where("WHERE id_imovel = $id_imovel");

		foreach($fotos as $val){
			echo '<tr>';
			echo '<td><img src="../img/imoveis/'.$val->getimagem().'" width="80px" /></td>';
			echo '<td>'.$val->gettitulo().'</td>';
			echo '<td>
				<a href="?acao=remover&id='.$val->getid().'&id_imovel='.$id_imovel.'" class="btn btn-danger"><i class="fa fa-times"></i></a> 
				</td>';
			echo '</tr>';
		}
		?>
	</table>	

	</div>
</div>

<? include("inc/footer.php"); ?>