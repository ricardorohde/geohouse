<?
require_once 'inc/conexao.php';

if($acao=="remover"){
	$id = $_GET['id'];
	if(ModelImovel::remover($id)){
		// remove as fotos
		$fotos = ModelImovelFoto::where("WHERE id_imovel = '$id' ");
		foreach($fotos as $removefoto){
			ModelImovelFoto::delete($removefoto->getid());
		}
		//
		header("location: imoveis.php?resultado=1");
		exit();
	}else{
		header("location: imoveis.php?resultado=0");
		exit();
	}
}

include("inc/header.php");

?>
<div class="container text-center">
	<div class="row" style="margin-bottom:20px;">
		<div class="col-md-12">
			<a href="imoveis_form.php?acao=novo" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Novo imóvel</a>
		</div>
	</div>
</div>

<div class="container panel">
	<div class="panel-body">
		<h1>Meus imóveis</h1>

		<table class="table table-striped">
			<?
			// paginacao
      $porpag = 10;

      if(isset($_GET['pag'])){
          $pagina = $_GET['pag'];
      }else{
          $pagina = 0;
      }

      $paginicio = $pagina * $porpag;
      $paginacao = " LIMIT ".$paginicio.", ".$porpag;

      $imoveis       = ModelImovel::where('ORDER BY id DESC'.$paginacao);
      $imoveis_total = ModelImovel::where('ORDER BY id DESC');

      $totalsql = 0;
      $totalsql = count($imoveis_total);
      $totalpag = ceil($totalsql / $porpag);

			foreach($imoveis as $val){
				echo '<tr>';
				echo '<td><a target="_blank" href="../encontre-imoveis-venda-'.$val->gethash().'">'.$val->getnome().'</a></td>';
				echo '<td><a href="imovel_placa.php?hash='.$val->gethash().'"><i class="fa fa-tag"></i></a></td>';
				echo '<td><a href="imovel_estatistica.php?hash='.$val->gethash().'"><i class="fa fa-cog"></i></a></td>';
				echo '<td width="160px">
								<a href="imoveis_foto.php?id_imovel='.$val->getid().'" class="btn btn-default"><i class="fa fa-photo"></i></a>
								<a href="?acao=remover&id='.$val->getid().'" class="btn btn-danger"><i class="fa fa-times"></i></a>
								<a href="imoveis_form.php?acao=editar&id='.$val->getid().'" class="btn btn-info"><i class="fa fa-pencil"></i></a>
							</td>';
				echo '</tr>';
			}
			?>
		</table>

	 	<!-- paginacao -->
    <div class="btn-group">
        <?
        for($i = 0; $i < $totalpag; $i++){
            if($pagina==$i){
                echo '<a href="imoveis.php?pag='.$i.'" class="btn btn-sm btn-default"><strong>'.($i+1).'</strong></a> ';
            }else{
                echo '<a href="imoveis.php?pag='.$i.'" class="btn btn-sm btn-default">'.($i+1).'</a> ';
            }
        }

        ?>
    </div>

	</div>
</div>

<? include("inc/footer.php"); ?>
