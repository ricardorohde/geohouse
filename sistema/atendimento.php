<?
require_once "sendmail.php";

$pagina = 'atendimento';

$acao = (isset($_GET['acao']))?$_GET['acao']:'';

if($acao=="contato"){
	$contato['nome'] 		= $_POST['txtnome'];
	$contato['email'] 		= trim($_POST['txtemail']);
	$contato['telefone'] 	= $_POST['txttelefone'];
	$contato['mensagem'] 	= $_POST['txtmensagem'];

	$enviou = 0;
	$titulo = 'Contato site';

	$texto = '';
	$texto .= '<strong>Nome:</strong> '.$contato['nome'].'<br />';
	$texto .= '<strong>Email:</strong> '.$contato['email'].'<br />';
	$texto .= '<strong>Telefone:</strong> '.$contato['telefone'].'<br /><br />';
	$texto .= '<strong>Mensagem:</strong> '.$contato['mensagem'].'<br />';

	// envia
	if(enviarEmail($titulo, $texto)){
		$enviou = 1;
	}
}
?>
<? include("inc/header.php"); ?>

<div class="container">
	<?
		if(isset($enviou)){
			if($enviou==1){
				echo '<div class="alert alert-success">Mensagem enviada com sucesso! Aguarde nosso retorno.</div>';
			}else{
				echo '<div class="alert alert-danger">Mensagem não enviada! Tente novamente ou contate-nos.</div>';
			}
		}
		?>
		<form method="post" action="?acao=contato" name="frmcontato">
			<div class="form-group">
				<label>Seu nome *</label>
				<input type="text" class="form-control" name="txtnome"  required/>
			</div>
			<div class="form-group">
				<label>Seu e-mail *</label>
				<input type="email" class="form-control" name="txtemail"  required/>
			</div>
			<div class="form-group">
				<label>Seu telefone</label>
				<input type="text" class="form-control" name="txttelefone" />
			</div>
			<div class="form-group">
				<label>Mensagem *</label>
				<textarea class="form-control" name="txtmensagem" required></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success btn-lg" value="Enviar" >
			</div>
			<span class="text-info">* Preencha todos os campos</span>

		</form>
</div>

<? include("inc/footer.php"); ?>
