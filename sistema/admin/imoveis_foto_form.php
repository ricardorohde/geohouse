<?

require_once "inc/conexao.php";

$id_imovel = $_GET['id_imovel'];

if($acao == "incluir"){
	$objeto = new ImovelFoto;
	$objeto->setid_imovel($_POST['txtid_imovel']);
    $objeto->settitulo($_POST['txttitulo']);
    $objeto->setdestaque($_POST['txtdestaque']);

    $imagem = '';
   
    if($_FILES['txtimagem']['name'] != ""){
        $imagem = SobeImagem($_FILES['txtimagem']['name'], $_FILES['txtimagem']['tmp_name'], '../img/imoveis/');
    }

    $objeto->setimagem($imagem);
	
	$inserir = ModelImovelFoto::inserir($objeto);
	if($inserir){
		header("location: imoveis_foto.php?resultado=1&id_imovel=".$id_imovel);
		exit();
	}else{
		header("location: imoveis_foto.php?resultado=0&id_imovel=".$id_imovel);
		exit();
	}

}

?>
<? include("inc/header.php"); ?>
<div class="container">
	<div class="panel">
		<form method="post" action="?acao=incluir&id_imovel=<?=$id_imovel?>" name="form" enctype="multipart/form-data" >
			<div class="panel-body">
				<a href="imoveis_foto.php" class="btn btn-default pull-right">Voltar</a>
				<h1>Adicionar Foto</h1>

				<input type="hidden" name="txtid_imovel" value="<?=$id_imovel?>">
			    
			    <div class="row">
			    	<div class="form-group col-md-12">
				    	<label>Selecione uma imagem</label>
				    	<input type="file" name="txtimagem" class="form-control">
			    	</div>
			    	<div class="form-group col-md-8">
				    	<label>Título</label>
				    	<input type="text" name="txttitulo" class="form-control">
			    	</div>
			    	<div class="form-group col-md-4">
				    	<label>Destaque</label>
				    	<select name="txtdestaque" class="form-control">
							<option value="0">Não</option>
							<option value="1">Sim</option>
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