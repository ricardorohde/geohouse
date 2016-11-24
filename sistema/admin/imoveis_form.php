<?

require_once "inc/conexao.php";

$imovel = new Imovel;

if($acao == "editar"){
	$id 		= $_GET['id'];
	$imovel 	= ModelImovel::where("WHERE id = '$id' LIMIT 1");
	$imovel 	= $imovel[0];

	if(isset($_GET['subacao'])){
		$imovel->setid_categoria($_POST['txtid_categoria']);
		$imovel->setnome($_POST['txtnome']);
		$imovel->setdescricao($_POST['txtdescricao']);
		$imovel->setvideo($_POST['txtvideo']);
		$imovel->setmapa($_POST['txtmapa']);
		$imovel->setvalor($_POST['txtvalor']);
		$imovel->setdestaque($_POST['txtdestaque']);
		$imovel->setid_tipo_imovel($_POST['txtid_tipo_imovel']);
		$imovel->setid_finalidade($_POST['txtid_finalidade']);
		$imovel->setid_cidade($_POST['txtid_cidade']);
		$imovel->setdormitorios($_POST['txtdormitorios']);
		$imovel->setsuites($_POST['txtsuites']);
		$imovel->setcond_fechado($_POST['txtcond_fechado']);
		$imovel->setarea_util($_POST['txtarea_util']);
		$imovel->setarea_total($_POST['txtarea_total']);
		$imovel->setvagas($_POST['txtvagas']);

		$update = ModelImovel::update($imovel);

		if($update){
			header("location: imoveis.php?resultado=1");
			exit();
		}else{
			header("location: imoveis.php?resultado=0");
			exit();
		}

	}
}

if($acao == "incluir"){
	$imovel = new Imovel;
	$imovel->sethash($_POST['txthash']);
	$imovel->setid_usuario($_SESSION['usuario_id']);
	$imovel->setid_categoria($_POST['txtid_categoria']);
	$imovel->setnome($_POST['txtnome']);
	$imovel->setdescricao($_POST['txtdescricao']);
	$imovel->setvideo($_POST['txtvideo']);
	$imovel->setmapa($_POST['txtmapa']);
	$imovel->setvalor($_POST['txtvalor']);
	$imovel->setdestaque($_POST['txtdestaque']);
	$imovel->setid_tipo_imovel($_POST['txtid_tipo_imovel']);
	$imovel->setid_finalidade($_POST['txtid_finalidade']);
	$imovel->setid_cidade($_POST['txtid_cidade']);
	$imovel->setdormitorios($_POST['txtdormitorios']);
	$imovel->setsuites($_POST['txtsuites']);
	$imovel->setcond_fechado($_POST['txtcond_fechado']);
	$imovel->setarea_util($_POST['txtarea_util']);
	$imovel->setarea_total($_POST['txtarea_total']);
	$imovel->setvagas($_POST['txtvagas']);

	$inserir = ModelImovel::inserir($imovel);
	if($inserir){
		header("location: imoveis.php?resultado=1");
		exit();
	}else{
		header("location: imoveis.php?resultado=0");
		exit();
	}
}

function NovaHash($caracteres){
	$hash = '';
	$string 	= 'abcdefghijklmnopqrstuvxywz0123456789';

	for($i = 0; $i < $caracteres; $i++){
		$hash .= substr(str_shuffle($string), 0, 1);
	}

	return $hash;
}
$novahash 	= NovaHash(10);

?>
<? include("inc/header.php"); ?>

<div class="container">
	<div class="row" style="margin-bottom:20px;">
		<div class="col-md-12">
			<a href="imoveis.php" class="btn btn-default">Voltar</a>
			<h1 class="pull-right">Novo imóvel</h1>
		</div>
	</div>
</div>

<div class="container">
	<div class="panel">
		<form method="post" action="<?=($acao=='editar')?'?acao=editar&subacao=update&id='.$id:'?acao=incluir'?>" name="form">
			<div class="panel-body">

				<div class="row">
					<div class="form-group col-md-2">
						<label>#código</label>
						<input type="text" name="txthash" class="form-control" value="<?=($acao=='editar')?$imovel->gethash():$novahash?>" readonly >
					</div>
					<div class="form-group col-md-2">
						<label>Categoria</label>
						<select name="txtid_categoria" class="selectpicker form-control">
						<?
						foreach(ModelCategoria::where('') as $val){
							echo '<option value="'.$val->getid().'" '.(($imovel->getid_categoria()==$val->getid())?"selected='selected'":'').'>'.$val->getnome().'</option>';
						}
						?>
						</select>
					</div>
					<div class="form-group col-md-8">
						<label>Nome</label>
						<input type="text" name="txtnome" class="form-control" value="<?=$imovel->getnome()?>">
					</div>
					<div class="form-group col-md-12">
						<label>Descrição</label>
						<textarea name="txtdescricao" class="form-control"><?=$imovel->getdescricao()?></textarea>
					</div>
					<div class="form-group col-md-6">
						<label>Vídeo embed Youtube</label>
						<textarea name="txtvideo" class="form-control"><?=$imovel->getvideo()?></textarea>
					</div>
					<div class="form-group col-md-6">
						<label>Maps Google</label>
						<textarea name="txtmapa" class="form-control"><?=$imovel->getmapa()?></textarea>
					</div>
					<div class="form-group col-md-2">
						<label>Valor R$</label>
						<input type="text" name="txtvalor" class="form-control" value="<?=$imovel->getvalor()?>">
					</div>
					<div class="form-group col-md-2">
						<label>Destaque</label>
						<select name="txtdestaque" class="selectpicker form-control">
							<option value="0" <?=($imovel->getdestaque()==0)?'selected="selected"':''?> >Não</option>
							<option value="1" <?=($imovel->getdestaque()==1)?'selected="selected"':''?> >Sim</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label>Tipo do imóvel</label>
						<select name="txtid_tipo_imovel" class="selectpicker form-control">
						<?
						foreach(ModelTipo::where('') as $val){
							echo '<option value="'.$val->getid().'" '.(($imovel->getid_tipo_imovel()==$val->getid())?'selected="selected"':'').'>'.$val->getnome().'</option>';
						}
						?>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label>Finalidade</label>
						<select name="txtid_finalidade" class="selectpicker form-control">
						<?
						foreach(ModelFinalidade::where('') as $val){
							echo '<option value="'.$val->getid().'" '.(($imovel->getid_finalidade()==$val->getid())?'selected="selected"':'').'>'.$val->getnome().'</option>';
						}
						?>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label>Cidade</label>
						<select name="txtid_cidade" class="selectpicker form-control">
						<?
						foreach(ModelCidade::where('') as $val){
							echo '<option value="'.$val->getid().'" '.(($imovel->getid_cidade()==$val->getid())?'selected="selected"':'').'>'.$val->getnome().'</option>';
						}
						?>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label>Dormitórios</label>
						<input type="text" name="txtdormitorios" class="form-control bfh-number" value="<?=$imovel->getdormitorios()?>">
					</div>
					<div class="form-group col-md-2">
						<label>Suítes</label>
						<input type="text" name="txtsuites" class="form-control bfh-number" value="<?=$imovel->getsuites()?>">
					</div>
					<div class="form-group col-md-2">
						<label>Vagas</label>
						<input type="text" name="txtvagas" class="form-control bfh-number" value="<?=$imovel->getvagas()?>">
					</div>
					<div class="form-group col-md-2">
						<label>Cond. fechado</label>
						<select name="txtcond_fechado" class="selectpicker form-control">
							<option value="0" <?=($imovel->getcond_fechado()==0)?'selected="selected"':''?>>Não</option>
							<option value="1" <?=($imovel->getcond_fechado()==1)?'selected="selected"':''?>>Sim</option>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label>Área útil</label>
						<input type="text" name="txtarea_util" class="form-control" value="<?=$imovel->getarea_util()?>">
					</div>
					<div class="form-group col-md-2">
						<label>Área total</label>
						<input type="text" name="txtarea_total" class="form-control" value="<?=$imovel->getarea_total()?>">
					</div>
				</div>

			</div>
		</form>
		<div class="panel-footer text-right">
			<a href="javascript: void()" onclick="form.submit();" class='btn btn-success'>Concluir</a>
		</div>

	</div>
</div>

<? include("inc/footer.php"); ?>
