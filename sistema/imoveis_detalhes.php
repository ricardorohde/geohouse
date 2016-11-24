<?
require_once "admin/inc/conexao.php";
require_once "sendmail.php";
require_once 'vendor/autoload.php';

use abeautifulsite\SimpleImage;

$tipo 	= strtolower($_GET['tipo']);
$pagina = 'imoveis-'.$tipo;
$id 	= $_GET['id'];

$imovel = ModelImovel::where("WHERE hash = '$id' LIMIT 1");

if($imovel){
	$imovel = $imovel[0];
	// fotos 
	$fotos = ModelImovelFoto::where("WHERE id_imovel = ".$imovel->getid()." ");
}else{
	header("location: /");
	exit();
}

?>
<? include("inc/header.php"); ?>
<?
	
if($acao=="contato"){
	$contato['nome'] 		= $_POST['txtnome'];
	$contato['email'] 		= trim($_POST['txtemail']);
	$contato['telefone'] 	= $_POST['txttelefone'];
	$contato['mensagem'] 	= $_POST['txtmensagem'];

	$enviou = 0;
	$titulo = 'Interesse imovel: '.$id;

	$texto = '';
	$texto .= '<strong>Nome:</strong> '.$contato['nome'].'<br />';
	$texto .= '<strong>Email:</strong> '.$contato['email'].'<br />';
	$texto .= '<strong>Telefone:</strong> '.$contato['telefone'].'<br /><br />';
	$texto .= '<strong>Mensagem:</strong> '.$contato['mensagem'].'<br />';

	// envia
	if(enviarEmail($titulo, $texto)){
		echo '<div class="modal fade" id="modal_ok" tabindex="-1" role="dialog">
				<div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h2 class="text-info">Mensagem enviada!</h2>
				      </div>
				        <div class="modal-body">
				            <div class="alert alert-success">
				            Pronto, sua mensagem foi enviada. Aguarde nosso contato.
				            </div>
				        </div>
				    </div>
				</div>
			</div>

			<script> $("#modal_ok").modal("show"); </script>';
	}else{
		echo '<div class="modal fade" id="modal_ok" tabindex="-1" role="dialog">
				<div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h2 class="text-info">Mensagem não enviada!</h2>
				      </div>
				        <div class="modal-body">
				            <div class="alert alert-danger">
				            Ops. Sua mensagem não foi enviada.
				            </div>
				        </div>
				    </div>
				</div>
			</div>

			<script> $("#modal_ok").modal("show"); </script>';
	}
}

?>
<style>
.label_descreve{
	float:left;
	font-size: 18px;
	display: block;
	border-bottom: solid 1px #eee;
	margin: 5px;
	padding: 10px;
}
.label_descreve strong{
	font-size: 12px;
	color: #ccc;
	display: block;
	margin-bottom: -10px;
}
.destaca_imagem {
	border: solid 10px #eee;
}
.destaca_imagem:hover {
	border: solid 10px #ccc;
}

</style>
	<div class="base_destaque">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?
					if($imovel->getdestaque()==1){
						echo '<i class="fa fa-star" style="color: yellow;"></i> ';
					}
					?>
					<?=$imovel->getnome()?> 
					</h1>
				</div>	
			</div>
		</div>
	</div>
 
	<div class="container">
	<span class="breadcrumb">
				<a href="inicio">Home</a> /
				<a href="<?=$pagina?>"><?=$pagina?></a> / 
				<a href="javascript:void();"><?=$imovel->getnome()?></a>
				</span>
		<div class="row">
				
			<div class="col-md-12" style="margin-bottom:50px;margin-top:50px;">
				
				<!-- imoveis -->
				<div class="col-md-6">
					<img src="img/imoveis/<?=$fotos[0]->getimagem()?>" class="img-responsive destaca_imagem" width="100%" >
				</div>
				<!-- dados -->
				<div class="col-md-6">
					<?
					echo ($imovel->getid_categoria()!='')?'<div class="label_descreve"><strong>Categoria</strong>'.ModelCategoria::where("WHERE id='".$imovel->getid_categoria()."' limit 1")[0]->getnome().'</div>':'';
					echo ($imovel->getid_cidade()!='')?'<div class="label_descreve"><strong>Cidade</strong>'.ModelCidade::where("WHERE id='".$imovel->getid_cidade()."' LIMIT 1")[0]->getnome().'</div>':'';
					echo ($imovel->getid_tipo_imovel()!='')?'<div class="label_descreve"><strong>Tipo</strong>'.ModelTipo::where("WHERE id='".$imovel->getid_tipo_imovel()."' LIMIT 1")[0]->getnome().'</div>':'';
					echo ($imovel->getid_finalidade()!='')?'<div class="label_descreve"><strong>Finalidade</strong>'.ModelFinalidade::where("WHERE id='".$imovel->getid_finalidade()."' LIMIT 1")[0]->getnome().'</div>':'';
					
					echo ($imovel->getvalor()!=''and$imovel->getvalor()!=0)?'<div class="label_descreve"><strong>Valor</strong>'.$imovel->getvalor().'</div>':'';
					
					echo ($imovel->getdormitorios()!=''and$imovel->getdormitorios()!=0)?'<div class="label_descreve"><strong>Dormitórios</strong>'.$imovel->getdormitorios().'</div>':'';
					echo ($imovel->getsuites()!=''and$imovel->getsuites()!=0)?'<div class="label_descreve"><strong>Suites</strong>'.$imovel->getsuites().'</div>':'';
				    
					echo ($imovel->getcond_fechado()!=''and$imovel->getcond_fechado()!=0)?'<div class="label_descreve"><strong>Cond.fechado</strong>'.$imovel->getcond_fechado().'</div>':'';
					echo ($imovel->getarea_util()!='')?'<div class="label_descreve"><strong>Área útil</strong>'.$imovel->getarea_util().' m2</div>':'';
					echo ($imovel->getarea_total()!='')?'<div class="label_descreve"><strong>Área total</strong>'.$imovel->getarea_total().' m2</div>':'';
					echo ($imovel->getvagas()!=''and$imovel->getvagas()!=0)?'<div class="label_descreve"><strong>Vagas</strong>'.$imovel->getvagas().'</div>':'';
					echo ($imovel->gethash()!='')?'<div class="label_descreve"><strong>Cód.</strong>'.$imovel->gethash().'</div>':'';
				
					?>
					<div style="clear:both;"></div>
					<a href="#modal_interesse" style="clear:both; margin-top:30px;" data-imovel="<?=$id?>" data-toggle="modal" class='btn btn-transparente2'>MAIS INFORMAÇÕES</a>
				</div>
			</div>
			
		</div>
	</div>

	<!-- mais fotos do imovel -->
	<div class="amarelo_fundo" style="padding:30px;" >
		<div class="container multiple-items">
			<?
			if(count($fotos)>0){
				foreach($fotos as $foto){
					echo '
						<div class="col-md-2 col-xs-6">
							<div class="panel text-center">
								<!--<a href="img/imoveis/'.$foto->getimagem().'" data-lightbox="roadtrip">-->
								<a href="thumb.php?imagem='.$foto->getimagem().'&largura=600&altura=" data-lightbox="roadtrip">
								<img src="thumb.php?imagem='.$foto->getimagem().'&largura=200&altura=100" class="img-responsive" width="100%" >
								</a>
							</div>
						</div>
						';
				}
			}else{
				echo 'Não há fotos. Volte em breve.';
			}
			?>						
		</div>
	</div>

	<!-- descricao do imovel -->
	<div class="container">
		<div class="col-md-8 col-md-offset-2 text-center" style="margin-top:40px; margin-bottom:40px;">
			<h2>DETALHES</h2>
			<div class=" texto-grande">
				<p><?=$imovel->getdescricao()?></p>
			</div>
			<a href="#modal_interesse" data-imovel="<?=$id?>" data-toggle="modal" class='btn btn-transparente2'>GOSTOU? FALE CONOSCO</a>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<!-- video -->
			<div class="col-md-6 text-center">
				<?=($imovel->getvideo()!='')?$imovel->getvideo():''?>
			</div>

			<!-- mapa de localizacao do imovel -->
			<div class="col-md-6 text-center">		
				<?=($imovel->getmapa()!='')?$imovel->getmapa():''?>
			</div>
		</div>
	</div>


	<!-- modal consideracoes -->
	<div class="modal fade" id="modal_interesse" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h2 class="text-info">Tem interesse neste imóvel?</h2>
		      </div>
		        <div class="modal-body">
		            <form method="post" action="?acao=contato" name="frminteresse">	
		            <div class="form-group">
			            <label>Nome *</label>
			            <input type="text" class="form-control" name="txtnome">
		            </div>
		            <div class="form-group">
			            <label>E-mail *</label>
			            <input type="text" class="form-control" name="txtemail">
		            </div>
		            <div class="form-group">
			            <label>Telefone *</label>
			            <input type="text" class="form-control" name="txttelefone">
		            </div>
		            <div class="form-group">
			            <label>Mensagem *</label>
			            <textarea class="form-control" name="txtmensagem"></textarea>
		            </div>
		            <div class="form-group">
			            <input type="submit" class="btn btn-success btn-lg" value="Enviar" >
		            </div>
		            <span class="text-small">
		            	* campos obrigatórios<br />
		            	** seus dados não serão compartilhados com terceiros
		            </span>
		            </form>
		        </div>
		    </div>
		</div>
	</div>
	<!-- /.modal -->

<? include("inc/footer.php"); ?>
<script>
	// slides imoveis detalhes
	$(document).ready(function(){
		$('.multiple-items').slick({
		  infinite: true,
		  slidesToShow: 5,
		  slidesToScroll: 1,
		  dots: false,
			adaptiveHeight: true,
		  responsive: [
				    {
				      breakpoint: 1024,
				      settings: {
				        slidesToShow: 3,
				        slidesToScroll: 3,
				        infinite: true,
				        dots: true
				      }
				    },
				    {
				      breakpoint: 600,
				      settings: {
				        slidesToShow: 2,
				        slidesToScroll: 2
				      }
				    },
				    {
				      breakpoint: 480,
				      settings: {
				        slidesToShow: 1,
				        slidesToScroll: 1
				      }
				    }
				  ]
		});


  	$('.destaca_imagem')
    .wrap('<span style="display:inline-block"></span>')
    .css('display', 'block')
    .parent()
    .zoom({on: 'click'});


	});
</script>