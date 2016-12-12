<?
require_once "admin/inc/conexao.php";

$tipo 		= (isset($_GET['tipo']))?$_GET['tipo']:'venda';
$pagina 	= 'imoveis-'.$tipo;

$idcategoria = '';
if($tipo=='aluguel'){
	$idcategoria = 1;
}else{
	$idcategoria = 3;
}

$query = "AND id_categoria = ".$idcategoria." ";

// filtros
$filtro['tipoimovel'] 		= (isset($_GET['tipoimovel']))?$_GET['tipoimovel']:'';
$filtro['finalidade'] 		= (isset($_GET['finalidade']))?$_GET['finalidade']:'';
$filtro['cidade'] 			= (isset($_GET['cidade']))?$_GET['cidade']:'';
$filtro['dormitorio'] 		= (isset($_GET['dormitorio']))?$_GET['dormitorio']:'';
$filtro['suite'] 			= (isset($_GET['suite']))?$_GET['suite']:'';
$filtro['condfechado'] 		= (isset($_GET['condfechado']))?$_GET['condfechado']:'';
$filtro['vaga'] 			= (isset($_GET['vaga']))?$_GET['vaga']:'';
$filtro['autil'] 			= (isset($_GET['autil']))?$_GET['autil']:'';
$filtro['atotal'] 			= (isset($_GET['atotal']))?$_GET['atotal']:'';
//

if($filtro['tipoimovel']!=''){
	$query .= " AND id_tipo_imovel = ".$filtro['tipoimovel']." ";
}
if($filtro['finalidade']!=''){
	$query .= " AND id_finalidade = ".$filtro['finalidade']." ";
}
if($filtro['cidade']!=''){
	$query .= " AND id_cidade = ".$filtro['cidade']." ";
}
if($filtro['dormitorio']!=''){
	$query .= " AND dormitorios >= ".$filtro['dormitorio']." ";
}
if($filtro['suite']!=''){
	$query .= " AND suites >= ".$filtro['suite']." ";
}
if($filtro['condfechado']!=''){
	$query .= " AND cond_fechado = ".$filtro['condfechado']." ";
}
if($filtro['vaga']!=''){
	$query .= " AND vagas >= ".$filtro['vaga']." ";
}
if($filtro['autil']!=''){
	$query .= " AND area_util >= ".$filtro['autil']." ";
}
if($filtro['atotal']!=''){
	$query .= " AND area_total >= ".$filtro['atotal']." ";
}


// paginacao
$porpag = 9;

if(isset($_GET['pag'])){
    $pag = $_GET['pag'];
}else{
    $pag = 0;
}

$paginicio = $pag * $porpag;
$paginacao = " LIMIT ".$paginicio.", ".$porpag;

$imoveis 		= ModelImovel::where('WHERE ativo = 1 '.$query.' '.$paginacao);
$imoveis_total 	= ModelImovel::where('WHERE ativo = 1 '.$query);

$totalsql = 0;
$totalsql = count($imoveis_total);
$totalpag = ceil($totalsql / $porpag);

$total_imovel = $totalsql;

?>
<? include("inc/header.php"); ?>

	<div class="base_destaque">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<h1>
					ENCONTRE IMÓVEIS / <span class="amarelo"><?=strtoupper($tipo)?></span>
					</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12" style="background-color:#f2f2f2; padding-top:30px;">
				<form method="get">
					<div class="row">
						<div class="form-group col-md-4">
							<label>Tipo do imóvel</label>
							<select name="tipoimovel" class="form-control selectpicker" >
								<option value="">Todos</option>
							<?
							foreach(ModelTipo::where('') as $val){
								echo '<option value="'.$val->getid().'" '.(($filtro['tipoimovel']==$val->getid())?'selected="selected"':'').'>'.$val->getnome().'</option>';
							}
							?>
							</select>
						</div>

						<div class="form-group col-md-4">
							<label>Finalidade</label>
							<select name="finalidade" class="form-control selectpicker">
								<option value="">Todos</option>
							<?
							foreach(ModelFinalidade::where('') as $val){
								echo '<option value="'.$val->getid().'" '.(($filtro['finalidade']==$val->getid())?'selected="selected"':'').'>'.$val->getnome().'</option>';
							}
							?>
							</select>
						</div>

						<div class="form-group col-md-4">
							<label>Cidade</label>
							<select name="cidade" class="form-control selectpicker">
								<option value="">Todos</option>
							<?
							foreach(ModelCidade::where('') as $val){
								echo '<option value="'.$val->getid().'" '.(($filtro['cidade']==$val->getid())?'selected="selected"':'').'>'.$val->getnome().'</option>';
							}
							?>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-2">
							<label>Dormitórios</label>
							<input type="number" name="dormitorio" class="form-control" value="<?=$filtro['dormitorio']?>">
						</div>

						<div class="form-group col-md-2">
							<label>Suítes</label>
							<input type="number" name="suite" class="form-control" value="<?=$filtro['suite']?>">
						</div>

						<div class="form-group col-md-2">
							<label>Cond. fechado</label>
							<select name="condfechado" class="form-control selectpicker">
								<option value="" <?=(($filtro['condfechado']=='')?'selected="selected"':'')?> >Todos</option>
								<option value="0" <?=(($filtro['condfechado']==0)?'selected="selected"':'')?> >Não</option>
								<option value="1" <?=(($filtro['condfechado']==1)?'selected="selected"':'')?> >Sim</option>
							</select>
						</div>

						<div class="form-group col-md-2">
							<label>Vagas</label>
							<input type="number" name="vaga" class="form-control" value="<?=$filtro['vaga']?>">
						</div>

						<div class="form-group col-md-2">
							<label>Aplicar</label>
							<input type="submit" class="btn btn-success btn-block" value="FILTRAR">
						</div>

					</div>


					<!--
					<div class="row">
						<div class="form-group col-md-6">
							<label>Área útil</label>
							<input type="text" name="autil" class="form-control">
						</div>

						<div class="form-group col-md-6">
							<label>Área total</label>
							<input type="text" name="atotal" class="form-control">
						</div>
					</div>
					-->

				</form>
				<hr>
			</div>
			<div class="col-md-12" style="margin-bottom:50px;margin-top:50px;">
					<p>Resultado da sua busca: <strong><?=$total_imovel?> imóvel(eis) encontrado(s).</strong></p>
					<hr>
				<!-- imoveis -->
				<?

				if(count($imoveis)>0){
					foreach($imoveis as $val){
						$foto = ModelImovelFoto::where('WHERE id_imovel = '.$val->getid().' ');
						if(count($foto)>0){
							//$afoto = 'img/imoveis/'.$foto[0]->getimagem();
							$afoto = $foto[0]->getimagem();
						}
						$imovel_categoria = ModelCategoria::where("WHERE id='".$val->getid_categoria()."' LIMIT 1")[0]->getnome();
						echo '
							<div class="col-md-3">
								<div class="panel text-center box_imovel">
									<img src="thumb.php?imagem='.$afoto.'&largura=200&altura=100" class="img-responsive" width="100%" >
									<a href="encontre-imoveis-'.$tipo.'-'.$val->gethash().'" class="btn btn-transparente2 btn-xs">
									para '.$imovel_categoria.' | detalhes</a>
									<p>'.$val->getnome().'</p>
									<p><i class="fa fa-map-marker"></i> '.ModelCidade::where("where id=".$val->getid_cidade())[0]->getnome().'</p>
								</div>
							</div>

							';
					}
				}else{
					echo '<div class="col-md-12"><div class="alert alert-info">Nenhum imóvel encontrado.</div></div>';
				}
				?>


				<!-- imoveis fim -->
				<div class='col-md-12'>
				<hr>
					<nav>
					  <ul class="pagination">
					   	<?
	                    for($i = 0; $i < $totalpag; $i++){
	                        if($pagina==$i){
	                            echo '<li><a href="?pag='.$i.'"><strong>'.($i+1).'</strong></a></li> ';
	                        }else{
	                            echo '<li><a href="?pag='.$i.'">'.($i+1).'</a></li> ';
	                        }
	                    }
	                    ?>
					  </ul>
					</nav>
				</div>


			</div>

		</div>
	</div>

<? include("inc/footer.php"); ?>
